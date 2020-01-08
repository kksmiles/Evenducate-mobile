@extends('layouts.master')

@section('title')
    Edit Post for {{ $event->title }}
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
    <form action="/events/{{ $event->id }}/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        Description : <input type="text" name="description" value="{{ $post->description }}"> <br>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="img_path"  id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <input style="width:100%" type="submit" value="Edit Post" class="submit" onclick="">

    </form>
</div>
</div>
<div class="col-25">
</div>
</div>

@endsection
