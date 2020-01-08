<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;

class LikesController extends Controller
{
    public function fetchlikes(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $post = Post::find($query);
            $likecheck = Like::where('user_id', auth()->user()->id)
                                ->where('post_id', $post->id)
                                ->first();

            if ($likecheck) {
                Like::where('user_id', auth()->user()->id)
                        ->where('post_id', $post->id)
                        ->delete();
            }
            else {
                $like = new like;
                $like->user_id = auth()->user()->id;
                $like->post_id = $post->id;
                $like->save();
            }
            $data = $post->likes->count();

            echo $data;
        }
    }
}
