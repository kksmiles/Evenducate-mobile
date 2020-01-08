@extends('layouts/master')

@section('title')
    Edit your event
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/createevent.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/map.css') }}">
@endsection

@section('content')
<div class="row">
<div class="col-25">
</div>
  <div class="col-50">
    <div class="container">
        <form action="/events/{{ $event->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <!--<div class="row">
                <div class="col-50">-->
                    <legend><span class="number">1</span>Event Details</legend>
                    <hr><br/>
                    <label for="title">Event Title<span style="color:red;"> *</span></label>
                    <input style="background-color: white; color: black;" type="text" id="title" value="{{ $event->title }}" name="title" placeholder="Give it a short distinct name" required="true">
                    <label for="description">Event Description<span style="color:red;"> *</span></label>
                    <input type="text" id="description" name="description" value="{{ $event->description }}" placeholder="Describe what your event is about" required="true">

                    <div class="row">
                    <div class="col-50">
                    <label for="start">Starts</label>
                    <input type="date" name="start_date" value="{{ $event->start_date }}" required>
                    </div>
                    <dir class="col-50">
                    <label></label>
                    <input type="time" name="start_time" value="{{ $event->start_time }}" required>
                    </dir>
                    </div>

                    <div class="row">
                    <div class="col-50">
                    <label for="end">Ends</label>
                    <input type="date" name="end_date" value="{{ $event->end_date }}" required>
                    </div>
                    <dir class="col-50">
                    <label></label>
                    <input type="time" name="end_time" value="{{ $event->end_time }}" required>
                    </dir>
                    </div>
                    <div id="speakers">
                        <label for="speaker_name">Speaker Name</label>
                        <input type="text" id="speaker_name" placeholder="">
                        <div id="speakerList">

                        </div>
                        @foreach($chosenspeakers as $chosenspeaker)
                            <input type="checkbox" name="speakers[]" value="{{ $chosenspeaker->id }}" checked>{{ $chosenspeaker->name }}
                        @endforeach
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="img_path"  id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                <br/>
                <br/>
                    <legend><span class="number">2</span>Create Tickets</legend>
                <hr><br/>
                <p style="text-align: center; width: 100%; font-size: 20px;">What type of tickets do you want to start with?</p>
                <div class="row">
                    <div class="col-25">
                        <div class="row">
                            <div class="col-2">

                            </div>
                            <div class="col-3">
                                <input type="radio" name="ticket_type" value="Free"
                                @if($event->ticket_type=="Free")
                                    checked
                                @endif
                                > Free Ticket
                            </div>
                            <div class="col-3">
                                <input type="radio" name="ticket_type" value="Paid"
                                @if($event->ticket_type=="Paid")
                                    checked
                                @endif
                                > Paid Ticket
                            </div>
                            <div class="col-3">
                                <input type="radio" name="ticket_type" value="Donation"
                                @if($event->ticket_type=="Donation")
                                    checked
                                @endif
                                > Donation
                            </div>
                        </div>

                         <br>
                    </div>
                </div>
                <br/><br/>

                <legend><span class="number">3</span>Additional Settings</legend>
                <hr><br/>
                <label for="available_tickets">Number of Tickets</label>
                <input type="number" name="available_tickets" id="available_tickets" value="{{ $event->available_tickets }}"> <br>
                Show available Tickets
                <input type="radio" name="show_available_tickets" value="1"
                @if($event->show_available_tickets==1)
                    checked
                @endif
                > Yes
                <input type="radio" name="show_available_tickets" value="0"
                @if($event->show_available_tickets==0)
                    checked
                @endif
                > No <br>
                <label for="tags[]" style="text-align: center; width:100%; font-size: 25px; font-weight:bold;">Tags</label>
                <label class="text-muted"for="tags[]" style="text-align: center; width:100%;">How do you want your event to be associated?</label>

                <div class="custom-control custom-checkbox">
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

                </div>

               <br/><br/>
               <hr>
               <br/><br/>
               <h1 style="margin-left: 18%;">Nice one! You're almost done.</h1>
               <div class="row">
                <div class="col-50">
                  <input style="width:100%" type="submit" name="live" value="Submit your event Proposal" class="submit" onclick="">
                </div>
                </div>
                <!--</div>
            </div>-->
        </form>
</div>
</div>
<div class="col-25">
</div>
</div>
    @include('layouts.errors')


@endsection
