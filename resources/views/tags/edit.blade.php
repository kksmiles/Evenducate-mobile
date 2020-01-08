@extends('layouts.master')

@section('title')
    Edit
@endsection

@section('content')

    <form action="/tags/{{ $tag->id }}" method="post">
        @csrf
        @method('PATCH')
        Name : <input type="text" name="name" value="{{ $tag->name }}"> <br>
        <input type="submit" name="" value="submit">
    </form>

@endsection
