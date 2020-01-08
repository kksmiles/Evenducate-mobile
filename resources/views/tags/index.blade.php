@extends('layouts.master')

@section('title')
    Tags
@endsection

@section('content')

    @foreach($tags as $tag)
        <a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>
        <a href="/tags/{{ $tag->id }}/edit">Edit</a>
        <form action="/tags/{{ $tag->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" name="button">Delete</button>
        </form>
    @endforeach

    <a href="/tags/create">Create a new tag</a>

@endsection
