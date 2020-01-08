@extends('layouts.master')

@section('title')
    Post - {{ $post->title }}
@endsection

@section('content')

    {{ $post->description }}
    <a href="/events/{{ $event->id }}/posts/{{ $post->id }}/edit">Edit</a>
    <form action="/events/{{ $event->id }}/posts/{{ $post->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" name="button">Delete</button>
    </form>

@endsection
