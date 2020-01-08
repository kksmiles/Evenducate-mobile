<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Follow;

class FollowsController extends Controller
{
    public function fetchFollowers(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $profile = Profile::find($query);
            $followcheck = Follow::where('user_id', auth()->user()->id)
                                ->where('profile_id', $profile->id)
                                ->first();

            if ($followcheck) {
                Follow::where('user_id', auth()->user()->id)
                        ->where('profile_id', $profile->id)
                        ->delete();
            }
            else {
                $follow = new Follow;
                $follow->user_id = auth()->user()->id;
                $follow->profile_id = $profile->id;
                $follow->save();
            }
            $data = $profile->followers->count();
            echo $data;
        }
    }
}
