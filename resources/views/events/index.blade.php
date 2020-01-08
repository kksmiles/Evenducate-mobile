@extends('layouts/master')

@section('title')
    Events
@endsection

@section('content')
    @foreach($events as $event)
        <h1> <a href="/events/{{ $event->id }}/manageupload">{{ $event->title }}</a> </h1>
    @endforeach
@endsection
