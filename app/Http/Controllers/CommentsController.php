<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function fetchComments(Request $request)
    {
        if($request->get('comment'))
        {
            $query = $request->get('query');
            $comment = $request->get('comment');
            $post = Post::find($query);
            Comment::create([
                'user_id' => auth()->user()->id,
                'post_id' => $post->id,
                'description' => $comment
            ]);
            $comments = Comment::all()->where('post_id', '==', $post->id);
            $data = '';
            foreach($comments as $comment)
            {
                $data .= "<li> " . $comment->description . " </li>";
            }
            echo $data;
        }
    }
}
