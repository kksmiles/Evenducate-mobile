<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use App\Like;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index(Event $event)
    {
        if(Post::all()->where('event_id', '==', $event->id)->count() > 0)
        {
            $posts = DB::table('posts')->where('event_id', $event->id)->paginate(1);
            $postscheck = Post::all()->where('event_id', '==', $event->id);
            $likechecks = array();
            $likecounts = array();
            $comments = array();
            foreach($postscheck as $postcheck)
            {
                $likecounts[$postcheck->id] = $postcheck->likes->count();
                $comments[$postcheck->id] = $postcheck->comments;
            }
            foreach($posts as $post)
            {
                $likecheck = Like::where('user_id', auth()->user()->id)
                                    ->where('post_id', $post->id)
                                    ->first();
                $likechecks[$post->id] = $likecheck;
            }

            return view('posts.index', compact('posts', 'event', 'likechecks', 'likecounts', 'comments'));
        }
        else {
            return view('posts.create', compact('event'));
        }

    }
    public function show(Event $event, Post $post)
    {
        return view('posts.show', compact('event', 'post'));
    }
    public function create(Event $event)
    {
        return view('posts.create', compact('event'));
    }
    public function store()
    {
        $attributes = request()->validate([
            'description' => [''],
            'event_id' => ['required']
        ]);
        $image = request()->validate([
            'img_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(request()->img_path)
        {
            $imagePath = request('img_path')->store('uploads/posts', 'public');
            Post::create($attributes + [
                'user_id' => auth()->id(),
                'img_path' => $imagePath,
            ]);
        }
        else
        {
            Post::create($attributes + [
                'user_id' => auth()->id(),
            ]);
        }
        $event_id = request()->event_id;
        return redirect('/events/'. $event_id . '/posts');
    }
    public function edit(Event $event, Post $post)
    {
        return view('posts.edit', compact('post', 'event'));
    }
    public function update(Event $event, Post $post)
    {
        $attributes = request()->validate([
            'description' => [''],
        ]);
        $image = request()->validate([
            'img_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(request()->img_path)
        {
            $imagePath = request('img_path')->store('uploads/posts', 'public');
            $post->update($attributes + [
                'img_path' => $imagePath,
            ]);
        }
        else
        {
            $post->update($attributes + [
                'user_id' => auth()->id(),
            ]);
        }
        $event_id = $event->id;
        return redirect('/events/'. $event_id . '/posts');
    }
    public function destroy(Event $event, Post $post)
    {
        $event_id = $event->id;
        $post->delete();
        return redirect('/events/'. $event_id . '/posts');
    }
}
