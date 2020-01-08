@extends('layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/feed.css') }}">
<!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    form {
        margin: 140px auto;
        width: 80%;
        overflow: hidden;
        background: #fff;

    }


    form input {
        border-radius: 20px;
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #eee;
        width: 100%;
        border: 0;
        margin: 0 0 1px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 15px;
    }
</style>
@endsection

@section('title')
Browse Events
@endsection

@section('content')
<div id="headingbar">
    <header>
        <h1 style="color:#0277bd;">Search</h1>
    </header>
</div>

<form>
    <div id="events">
        @csrf
        <input type="text" class="search" name="event_name" id="event_name"
        placeholder="Search">
        <div id="eventList" style="height: 450px; overflow-y: scroll; overflow-x: hidden; margin-top: 30px;">

        </div>
    </div>
</form>

<script>
    $(document).ready(function() {


        $('#event_name').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocomplete.fetch.events') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#eventList').fadeIn();
                        $('#eventList').html(data);
                    }
                });
            }
            else {
                $('#eventList').hide();
            }
        });


    });
</script>

@endsection
