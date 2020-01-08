@extends('layouts/master')

@section('title')
    Register Your Location
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/map.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/createevent.css') }}">
@endsection

@section('content')
<div class="row">
<div class="col-25">
</div>
  <div class="col-50">
    <div class="container">
    <form action="/locations" method="post" enctype="multipart/form-data">
        @csrf
        Enter Name : <input type="text" name="name" value=""> <br>
        Enter Description : <input type="text" name="description" value=""> <br>
        Open : <input type="time" name="open_time" value=""> <br>
        Close : <input type="time" name="close_time" value=""> <br>
        Days : <br>
        <input type="checkbox" name="days[]" value="Sun"> Sun
        <input type="checkbox" name="days[]" value="Mon"> Mon
        <input type="checkbox" name="days[]" value="Tue"> Tue
        <input type="checkbox" name="days[]" value="Wed"> Wed
        <input type="checkbox" name="days[]" value="Thu"> Thu
        <input type="checkbox" name="days[]" value="Fri"> Fri
        <input type="checkbox" name="days[]" value="Sat"> Sat <br>
        Address : <input type="text" name="address" value=""> <br>
        City : <input type="text" name="city" value=""> <br>
        State : <input type="text" name="state" value=""> <br>
        Country : <input type="text" name="country" value=""> <br>
        Phone : <input type="text" name="phone" value=""> <br>
        Image :
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="img_path"  id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <input type="hidden" id="lat" name="lat"><br>
        <input type="hidden" id="lng" name="lng"><br>
        <input type="hidden" name="place_name" id="place_name"><br>
        <input type="hidden" name="place_address" id="place_address">
        <input style="width:100%" type="submit" name="live" value="Create Location" class="submit" onclick="">

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
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>
</div>
</div>
<div class="col-25">
</div>
</div>
    @include('layouts.errors')
    @include('layouts.placeautocomplete')


@endsection
