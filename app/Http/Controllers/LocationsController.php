<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\User;

class LocationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $locations = Location::paginate(6);
        return view('locations.index', compact('locations'));
    }
    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }
    public function create()
    {
            return view('locations.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3'],
            'open_time' => ['required', 'date_format:H:i'],
            'close_time' => 'required|date_format:H:i|after:open_time',
            'address' => ['required', 'min:3'],
            'city' => ['required', 'min:3', 'max:255'],
            'state' => ['required', 'max:255'],
            'country' => ['required', 'min:3', 'max:255'],
            'phone' => ['max:255'],
            'lat' => ['required', 'numeric'],
            'lng' => ['required', 'numeric'],
            'place_name' => ['required', 'min:3', 'max:255'],
            'place_address' => ['required', 'min:3', 'max:255'],
        ]);
        $days = request()->validate([
            'days' => ['required']
        ]);
        $days = request()->days;
        $days = implode(', ', $days);
        $image = request()->validate([
            'img_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(request()->img_path)
        {
            $imagePath = request('img_path')->store('uploads/locations', 'public');
            Location::create($attributes + [
                'owner_id' => auth()->id(),
                'img_path' => $imagePath,
                'days' => $days,
            ]);
        }
        else
        {
            Location::create($attributes + [
                'owner_id' => auth()->id(),
                'days' => $days,
            ]);
        }


        return redirect('/locations/create');
    }

    public function edit(Location $location)
    {
        $this->authorize('update', $location);
        return view ('locations.edit', compact('location'));
    }

    public function update(Location $location)
    {
        $this->authorize('update', $location);
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3'],
            'open_time' => ['required'],
            'close_time' => ['required'],
            'address' => ['required', 'min:3'],
            'city' => ['required', 'min:3', 'max:255'],
            'state' => ['required', 'max:255'],
            'country' => ['required', 'min:3', 'max:255'],
            'phone' => ['max:255'],
            'lat' => ['required', 'numeric'],
            'lng' => ['required', 'numeric'],
            'place_name' => ['required', 'min:3', 'max:255'],
            'place_address' => ['required', 'min:3', 'max:255'],
        ]);
        $days = request()->validate([
            'days' => ['required']
        ]);
        dd(request()->img_path);
        $days = request()->days;
        $days = implode(', ', $days);
        $image = request()->validate([
            'img_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        dd($image);
        if(request()->img_path)
        {
            $imagePath = request('img_path')->store('uploads/locations', 'public');
            $location->update($attributes +
            [
                'img_path' => $imagePath,
                'days' => $days,
            ]);
        }
        else {
            $location->update($attributes + ['days' => $days]);

        }

        return redirect('/locations');
    }

    public function destroy(Location $location)
    {
        $this->authorize('delete', $location);
        $location->delete();
        return redirect('/locations');
    }
}
