<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Event;
use App\Location;
use App\Interest;
use App\Tag;
use App\User;
use App\Mail\EventProposal;

class EventsController extends Controller
{
    public function getUri($request)
    {
      $uri = $request->route()->uri;
      if(strpos($uri, '/')) {
        $uri_array = explode('/',$uri);
        $uri = $uri_array[0];
      }
      return $uri;
    }
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'browse']);
    }
    public function feed(Request $request)
    {
        // Deleted Feed algorithm, to keep it confidential.
        $uri = $this->getUri($request);
        $events = Event::paginate(6);
        return view('events.feed', compact('events','uri'));
    }
    public function browse(Request $request)
    {
        $uri = $this->getUri($request);
        $events = Event::paginate(6);
        return view('events.browse', compact('events','uri'));
    }
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
    public function show(Event $event)
    {
        if(auth()->user())
        {
            $interestcheck = Interest::where('user_id', auth()->user()->id)
                                ->where('interested_event_id', $event->id)
                                ->first();
            $location = Location::find($event->location_id);
            return view('events.show', compact('event', 'location', 'interestcheck'));
        }
        else {
            $location = Location::find($event->location_id);
            return view('events.show', compact('event', 'location'));
        }

    }
    public function create(Location $location, Request $request)
    {
        $uri = $this->getUri($request);
        $user = auth()->user();
        $tags = Tag::all();
        return view('events.create', compact('location', 'user', 'tags', 'uri'));
    }
    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3', 'max:255'],
            'location_id' => ['required'],
            'organizer_id' => ['required'],
            'ticket_type' => ['required', 'min:3', 'max:255'],
            'available_tickets' => ['required'],
            'show_available_tickets' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required', 'after:start_time'],
            'start_date' => ['required', 'after:today'],
            'end_date' => ['required', 'after_or_equal:start_date']
        ]);
        $image = request()->validate([
            'img_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(request()->img_path)
        {
            $imagePath = request('img_path')->store('uploads/events', 'public');
            $event = Event::create($attributes + ['img_path' => $imagePath]);
        }
        else
        {
            $event = Event::create($attributes);
        }
        $event->tags()->attach(request()->tags);
        $event->speakers()->attach(request()->speakers, ['approval' => 0, 'title' => '', 'description' => '']);
        $location_manager = $event->location->user;
        // \Mail::to($location_manager->email)->send(
        //     new EventProposal($event)
        // );
        return redirect('/events/'. $event->id);
    }
    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        $location = Location::find($event->location_id);
        $tags = Tag::all();
        $chosentags = $event->tags;
        $chosenspeakers = $event->speakers;

        return view('events.edit', compact('event', 'location', 'tags', 'chosentags', 'chosenspeakers'));
    }
    public function update(Event $event)
    {
        $this->authorize('update', $event);
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3', 'max:255'],
            'ticket_type' => ['required', 'min:3', 'max:255'],
            'available_tickets' => ['required'],
            'show_available_tickets' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required']
        ]);
        $image = request()->validate([
            'img_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(request()->img_path)
        {
            $imagePath = request('img_path')->store('uploads/events', 'public');
            $event->update($attributes + ['img_path' => $imagePath]);
        }
        else
        {
            $event->update($attributes);
        }

        $event->tags()->attach(request()->tags);
        $event->speakers()->attach(request()->speakers);
        return redirect('/feed');
    }
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();
        return redirect('/events');
    }

    public function fetchInterests(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $event = Event::find($query);
            $interestcheck = Interest::where('user_id', auth()->user()->id)
                                ->where('interested_event_id', $event->id)
                                ->first();

            if ($interestcheck) {
                Interest::where('user_id', auth()->user()->id)
                        ->where('interested_event_id', $event->id)
                        ->delete();
                $data = 0;
            }
            else {
                $interest = new Interest;
                $interest->user_id = auth()->user()->id;
                $interest->interested_event_id = $event->id;
                $interest->save();
                $data = 1;
            }
            echo $data;
        }
    }
    public function uploadForm(Event $event)
    {
        return view('events.uploadForm', compact('event'));
    }
    public function storeUpload(Event $event)
    {
        $video = request()->validate([
            'video_upload' => 'mimes:mp4,mov,ogg,qt | max:50000',
        ]);
        $powerpoint = request()->validate([
            'powerpoint_upload' => 'mimes:ppt,pptx|max:5000'
        ]);
        if(request()->video_upload)
        {
            $videoPath = request('video_upload')->store('uploads/videos', 'public');
            $event->update([
                'video_upload' => $videoPath,
            ]);
        }
        if(request()->powerpoint_upload)
        {
            $powerpointPath = request('powerpoint_upload')->store('uploads/powerpoints', 'public');
            $event->update([
                'powerpoint_upload' => $powerpointPath,
            ]);
        }
        return redirect('/events/'. $event->id);
    }
    public function getVideo(Event $event)
    {
        $file= $event->video_upload;

        return response()->download(storage_path("app/public/{$file}"));

    }
    public function getPowerpoint(Event $event)
    {
        $file= $event->powerpoint_upload;


        return response()->download(storage_path("app/public/{$file}"));
    }
    public function manageUpload(Event $event)
    {
        return view('admins.manage-upload', compact('event'));
    }
    public function storeManageUpload(Event $event)
    {
        $attributes = request()->validate([
            'powerpoint_frame' => ['required'],
        ]);
        $event->update($attributes);
        return redirect('/events');
    }
    public function fetchGoings(Request $request)
    {

    }
    public function getTicket(Event $event)
    {
        $user = User::find(auth()->id());
        $user->events()->attach($event->id);
        return view('events.ticket', compact('event'));
    }
}
