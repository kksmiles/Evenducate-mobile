@extends('layouts.master')

@section('title')
    Tag - {{ $tag->name }}
@endsection

@section('content')

    {{ $tag->name }}
    <a href="/tags/{{ $tag->id }}/edit">Edit</a>
    <form action="/tags/{{ $tag->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" name="button">Delete</button>
    </form>

@endsection
