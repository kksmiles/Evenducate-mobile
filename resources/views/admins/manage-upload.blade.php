@extends('layouts.master')

@section('title')
    Create Tags
@endsection

@section('content')

    <form action="/events/{{ $event->id }}/storeManageUpload" method="post">
        @csrf
    Iframe for powerpoint : <input type="text" name="powerpoint_frame" value="{{ $event->powerpoint_frame }}"> <br>
        <input type="submit" name="" value="submit">
    </form>
    @include('layouts.errors')

@endsection
