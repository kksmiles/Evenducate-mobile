@extends('layouts.master')

@section('title')
    Upload for {{ $event->title }}
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/createevent.css') }}">
@endsection

@section('content')
<div class="row">
<div class="col-25">
</div>
  <div class="col-50">
    <div class="container">
        <form action="/events/{{ $event->id }}/upload" method="post"  enctype="multipart/form-data">
            @csrf

            Video :
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="video_upload" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            Powerpoint :
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="powerpoint_upload" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <input style="width:100%" type="submit" value="Save" class="submit" onclick="">

        </form>
        @include('layouts.errors')
</div>
</div>
<div class="col-25">
</div>
</div>
@endsection
