<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Profile;
use App\Location;
use App\Event;

class AutocompleteController extends Controller
{
    public function fetchTags(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('tags')->where('name', 'LIKE', "%{$query}%")->get();
            $output = '
                <ul class="dropdown-menu" style="display : block; position : relative;">
            ';
            foreach ($data as $row)
            {
                $output .= '
                    <li id="tagitem" data-value='. $row->id .'> <a href="#">' . $row->name . ' </a></li>
                ';
            }
            $output .= "</ul>";
            echo $output;
        }
    }
    public function fetchSpeakers(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('users')->where('name', 'LIKE', "%{$query}%")->get();
            $output = '
                <ul class="dropdown-menu" style="display : block; position : relative; width: 100%">
            ';
            foreach ($data as $row)
            {
                $output .= '
                    <li style="padding-left: 20px; padding-top: 5px;" id="speakeritem" data-value='.
                    $row->id .'> <img src=" '. Profile::find($row->id)->profileImage() . '
                    " width="50px" height="50px" >  <a style="margin-left: 10px;color: black; font-size: 18px;"
                    href="#">' . $row->name . ' </a></li>
                    <hr/>
                ';
            }
            $output .= "</ul>";
            echo $output;
        }
    }
    public function fetchLocations(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('locations')->where('name', 'LIKE', "%{$query}%")->get();
            $output = '
                <ul class="dropdown-menu" style="display : block; position : relative; width: 100%">
            ';
            foreach ($data as $row)
            {
                $output .= '
                    <li style="padding-left: 20px; padding-top: 5px;" id="locationitem" data-value='.$row->id .'><img src="'. Location::find($row->id)->locationImage().' "width="50px" height="50px" ><a style="margin-left: 10px;color: black; font-size: 18px;" href="/locations/'.$row->id .'">'.$row->name.'</a></li>
                ';
            }
            $output .= "</ul>";
            echo $output;
        }
    }
    public function fetchEvents(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('events')->where('title', 'LIKE', "%{$query}%")->get();
            $output = '

            ';
            foreach ($data as $row)
            {
                $output .= '
                    <div class="row" style="margin-top: 25px;" id="eventitem" data-value='.$row->id .'>
                        <div class="col-3">
                            <img src="'. Event::find($row->id)->eventImage().' "width="70px" height="50px">
                        </div>
                        <div class="col-9 pl-3">
                            <a style="color: black; font-size: 15px;"
                            href="/events/'.$row->id .'">'.$row->title.'</a>
                            <b style="color: gray; font-size: 13px; display: block;">'
                            . Location::find($row->location_id)->name.'</b>
                        </div>
                    </div>
                ';
            }
            echo $output;
        }
    }
    public function fetchsEvents(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('events')->where('title', 'LIKE', "%{$query}%")->get();
            $output = '
                <ul class="dropdown-menu" style="display : block; position : relative; width: 100%">
            ';
            foreach ($data as $row)
            {
                $output .= '
                    <li style="padding-left: 20px; padding-top: 5px;" id="seventitem" data-value='.$row->id .'><img src="'. Event::find($row->id)->eventImage().' "width="50px" height="50px" ><a style="margin-left: 10px;color: black; font-size: 18px;" href="/events/'.$row->id .'">'.$row->title.'</a></li>
                ';


            }
            $output .= "</ul>";
            echo $output;
        }
    }


}
