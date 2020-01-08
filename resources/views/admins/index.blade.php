@extends('layouts.master')

@section('title')
    Admin DashBoard
@endsection

@section('content')

    @if(auth()->id()==1)
        <a href="/tags/create">Create a new tag</a> <br>
        <a href="/events">Manage Uploads</a><br>
        <a href="/telescope">Telescope</a>
        @else
        {!! "<script> location='/' </script>" !!}
    @endif


@endsection
