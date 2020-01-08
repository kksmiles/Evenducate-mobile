@extends('layouts/master')

@section('title')
    Edit Your Location
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/createevent.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/map.css') }}">
@endsection

@section('content')
<div class="row">
<div class="col-25">
</div>
  <div class="col-50">
    <div class="container">
    <form action="/locations/{{ $location->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        Enter Name : <input type="text" name="name" value="{{ $location->name }}"> <br>
        Enter Description : <input type="text" name="description" value="{{ $location->description }}"> <br>
        Enter Opening Hours : <br>
        Open : <input type="time" name="open_time" value="{{ $location->open_time }}"> <br>
        Close : <input type="time" name="close_time" value="{{ $location->close_time }}"> <br>
        Days :
                <input type="checkbox" name="days[]" value="Sun"> Sun <br>
                <input type="checkbox" name="days[]" value="Mon"> Mon <br>
                <input type="checkbox" name="days[]" value="Tue"> Tue <br>
                <input type="checkbox" name="days[]" value="Wed"> Wed <br>
                <input type="checkbox" name="days[]" value="Thu"> Thu <br>
                <input type="checkbox" name="days[]" value="Fri"> Fri <br>
                <input type="checkbox" name="days[]" value="Sat"> Sat <br>
        Address : <input type="text" name="address" value="{{ $location->address }}"> <br>
        City : <input type="text" name="city" value="{{ $location->city }}"> <br>
        State : <input type="text" name="state" value="{{ $location->state }}"> <br>
        Country : <input type="text" name="country" value="{{ $location->country }}"> <br>
        Phone : <input type="text" name="phone" value="{{ $location->phone }}"> <br>
        Image :
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="img_path"  id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <br>
        <input type="text" id="lat" value="{{ $location->lat }}" name="lat"><br>
        <input type="text" id="lng" value="{{ $location->lng}}" name="lng"><br>
        <input type="text" name="place_name" id="place_name" value="{{ $location->place_name }}"><br>
        <input type="text" name="place_address" id="place_address" value="{{ $location->place_address }}">
        <input style="width:100%" type="submit" name="live" value="Edit Location" class="submit" onclick="">
    </form>
    <div class="pac-card" id="pac-card">
      <div>
        <div id="type-selector" class="pac-controls">
          <input type="radio" name="type" id="changetype-all" checked="checked">
          <label for="changetype-all">All</label>

        </div>
        <div id="strict-bounds-selector" class="pac-controls">
          <input type="checkbox" id="use-strict-bounds" value="">
          <label for="use-strict-bounds">Strict Bounds</label>
        </div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text"
            placeholder="Enter a location">
      </div>
    </div>
    <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"> {{ $location->place_name }} </span><br>
      <span id="place-address"> {{ $location->place_address }} </span>
    </div>
</div>
</div>
<div class="col-25">
</div>
</div>
    @include('layouts.errors')
    @include('layouts.placeautocompleteupdate')
@endsection
