@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/eventdetail.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/map.css') }}">
@endsection

@section('title')
  Event
@endsection

@section('content')

<script type="text/javascript">

    function getProperDate(date, id)
    {
        var jsDate = new Date(Date.parse(date.replace('-','/','g')));
        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";
        var weekday = new Array(7);
        weekday[0] = "Sun";
        weekday[1] = "Mon";
        weekday[2] = "Tues";
        weekday[3] = "Wed";
        weekday[4] = "Thurs";
        weekday[5] = "Fri";
        weekday[6] = "Sat";
        var m = month[jsDate.getMonth()];
        var d = weekday[jsDate.getDay()];
        var n = jsDate.getDate();
        var y = jsDate.getFullYear();
        var output = d + ", " + m + " " + n;
        document.getElementById("eventdate").innerHTML = output;
        document.getElementById("eventdate1").innerHTML = output + ", " + y;
    }
    function tConvert (starttime, endtime) {
      starttime = starttime.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [starttime];
      endtime = endtime.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [endtime];


      if (starttime.length > 1) {
        starttime = starttime.slice (1);
        starttime[5] = +starttime[0] < 12 ? ' AM' : ' PM';
        starttime[0] = +starttime[0] % 12 || 12;
      }
      if (endtime.length > 1) {
        endtime = endtime.slice (1);
        endtime[5] = +endtime[0] < 12 ? ' AM' : ' PM';
        endtime[0] = +endtime[0] % 12 || 12;
      }

      var start_time = starttime.join ('');
      var end_time = endtime.join ('');
      document.getElementById("eventstarttime").innerHTML = start_time;
      document.getElementById("eventendtime").innerHTML = end_time;

    }

</script>

  <div class="container eventcard">
    <div class="row">
      <div class="col-4 mt-3">
          <img src="/storage/uploads/events/qrcode.png" width="300px" height="300px" alt="...">
      </div>

      <div class="col-8 mt-3">
        <div class="row mr-3 ml-1">
          <h5 class="eventdate" id="eventdate">

          </h5>

        </div>
        <div class="row mr-3 ml-1">
            <div class="col-2">
                <p class="" style="font-size: 20px; font-weight : bold;">
                    User :
                </p>
            </div>

            <div class="col-5">
                <p class="" style="font-size: 20px; font-weight : bold;">
                    {{ auth()->user()->name }}
                </p>
            </div>
        </div>
        <div class="row mr-3 ml-1">
            <div class="col-2">
                <p class=""  style="font-size: 20px; font-weight : bold;">
                    Event :
                </p>
            </div>
            <div class="col-10">
                <p class="" style="font-size: 20px; font-weight : bold;">
                    {{ $event->title }}
                </p>
            </div>
        </div>
        <div class="row mr-3 ml-1">
            <div class="col-12">
                <p>
                  <a href="/profiles/{{ $event->organizer_id }}">
                    <span class="speaker font-weight-bold">by {{ $event->organizer->name }}</span>
                  </a>

                </p>
            </div>

        </div>
        <div class="row ml-1">
            <div class="col-12">
                <p class="card-text eventplace">
                    {{ $event->location->place_name }}
                </p>
            </div>

        </div>
        <span class="tag text-center" style="top: 200px;">
            {{ $event->ticket_type }}
        </span>


      </div>
    </div>
  </div>

@endsection
