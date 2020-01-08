@extends('layouts.master')

@section('title')
    Create Tags
@endsection

@section('content')

    <form action="/tags" method="post">
        @csrf
        Name : <input type="text" name="name" value=""> <br>
        <input type="submit" name="" value="submit">
    </form>

@endsection
