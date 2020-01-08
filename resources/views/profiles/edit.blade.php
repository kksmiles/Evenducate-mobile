@extends('layouts.master')

@section('title')
    Edit Profile for {{ $profile->title }}
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
        <form action="/profiles/{{ $profile->id }}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            Title : <input type="text" name="title" value="{{ $profile->title }}"> <br>
            Description : <input type="text" name="description" value="{{ $profile->description }}"> <br>
            Website : <input type="text" name="website" value="{{ $profile->website }}"> <br>
            Image :
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="img_url" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <input style="width:100%" type="submit" value="Save" class="submit" onclick="">

        </form>
</div>
</div>
<div class="col-25">
</div>
</div>
@endsection
