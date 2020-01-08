@extends('layouts.master')

@section('title')
    Create Tags for {{ $profile->title }}
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
    <form action="/profiles/{{ $profile->id }}/tags" method="post">
        @csrf
        <div class="row">
            @foreach($tags as $tag)
            <div class="col-4">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                @foreach($chosentags as $chosentag)
                    @if($chosentag->name == $tag->name)
                        checked
                    @endif
                @endforeach
                >{{ $tag->name }} <br>

            </div>
            @endforeach
        </div>


        <input style="width:100%" type="submit" name="live" value="submit" class="submit" onclick="">
    </form>

</div>
</div>
<div class="col-25">
</div>
</div>

@endsection
