<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Follow;
use App\Tag;
use App\Event;
use Illuminate\Support\Facades\DB;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);

    }
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }
    public function show(Profile $profile)
    {
        $followcheck = Follow::where('user_id', auth()->user()->id)
                            ->where('profile_id', $profile->id)
                            ->first();

        $user = User::find($profile->user_id);
        $organizingEvents = Event::where('organizer_id', $profile->user_id)->paginate(3);
        return view('profiles.show', compact('profile', 'user', 'followcheck', 'organizingEvents'));
    }
    public function seventerests(Profile $profile)
    {
        $user = User::find($profile->user_id);
        $events = $user->interestedEvents;
        return view('profiles.interestedEvents', compact('events'));
    }

    public function edit(Profile $profile)
    {
        $this->authorize('update', $profile);
        return view('profiles.edit', compact('profile'));
    }

    public function update(Profile $profile)
    {
        $this->authorize('update', $profile);
        $attributes = request()->validate([
            'title' => ['min:3', 'max:255'],
            'description' => ['min:3', 'max:255'],
            'website' => ['min:3', 'max:255'],
        ]);
        $image = request()->validate([
            'img_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if(request()->img_url)
        {
            $imagePath = request('img_url')->store('uploads/profiles', 'public');
            $profile->update($attributes +
            [
                'img_url' => $imagePath
            ]);
        }
        else {
            $profile->update($attributes);

        }
        return redirect('/profiles');
    }
    public function destroy(Profile $profile)
    {
        $this->authorize('delete', $profile);
        $profile->delete();
        return redirect('/profiles');
    }

    public function createTags(Profile $profile)
    {
        $tags = Tag::all();
        $chosentags = User::find($profile->user_id)->tags;
        return view('profiles.createTag', compact('profile', 'tags', 'chosentags'));
    }

    public function userInterests(Profile $profile)
    {
        $user = User::find($profile->user_id);
        $events = $user->interestedEvents;
        return view('profiles.interestedEvents', compact('events'));
    }
    public function userGoingEvents(Profile $profile)
    {
        $user = User::find($profile->user_id);
        $events = $user->events;
        return view('profiles.interestedEvents', compact('events'));
    }
    public function userEvents(Profile $profile)
    {
        $user = User::find($profile->user_id);
        $events = $user->organizingEvents;
        return view('profiles.interestedEvents', compact('events'));

    }
    public function userLocations(Profile $profile)
    {
        $user = User::find($profile->user_id);
        $locations = $user->locations;
        return view('profiles.userLocations', compact('locations')) ;
    }

    public function storeTags(Profile $profile)
    {
        $tags = request()->tags;
        $user = User::find($profile->user_id);
        $user->tags()->attach($tags);
        return redirect('/profiles/'. $profile->user_id .'/tags/create');
    }
}
