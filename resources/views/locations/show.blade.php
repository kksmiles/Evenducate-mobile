@extends('layouts/master')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/eventdetail.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/map.css') }}">
@endsection

@section('title')
    {{ $location->name }}
@endsection


@section('content')
    <div class="container eventcard">
      <div class="row">
        <div class="col-8 mt-3">
            <img src="{{ $location->locationImage() }}" class="card-img eventimage" alt="...">
        </div>

        <div class="col-4 mt-3">
          <div class="row mr-3 ml-1">

          </div>
          <div class="row mr-3 ml-1">
              <p class="eventtitle">
                  {{ $location->name }}
              </p>
          </div>
          <div class="row mr-3 ml-1">
              @if($location->owner_id == auth()->id())

                  <p>
                      <a href="/locations/{{ $location->id }}/edit">
                          <button class="btn follow font-weight-bold ml-2" type="button" name="button">Edit</button>
                      </a>
                      <form action="/locations/{{ $location->id }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn follow font-weight-bold ml-2" type="submit" name="button">Delete</button>
                      </form>

                  </p>
              @endif

          </div>
          <div class="row mr-3 ml-1">
              <p>
                {{ $location->description }}
              </p>
          </div>
          <div class="row ml-1">
            <p class="card-text eventplace">
                {{ $location->place_name }}
            </p>
          </div>
          @auth
          <a href="/locations/{{ $location->id }}/events/create">
              <button class="btn btnRegister font-weight-bold" type="button" name="button">Host an Event</button>

          </a>
          @endauth


        </div>
      </div>
    </div>
    <div class="container eventcard">

      <div class="row mt-5" style="padding-bottom: 20px;">
        <div class="col-1">

        </div>
        <div class="col-10">

            <div id="map" style="width: 100%; height: 300px;">

            </div>
            <div id="infowindow-content">
              <img src="" width="16" height="16" id="place-icon">
              <span id="place-name"  class="title"> {{ $location->place_name }} </span><br>
              <span id="place-address"> {{ $location->place_address }} </span>
            </div>


        </div>
      </div>
    </div>

        @include('layouts.simplemarker')

@endsection
