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
      <div class="col-8 mt-3">
          <img src="{{ $event->eventImage() }}" class="card-img eventimage" alt="...">
      </div>

      <div class="col-4 mt-3">
        <div class="row mr-3 ml-1">
          <h5 class="eventdate" id="eventdate">

          </h5>
          @if($event->organizer_id !== auth()->id())
              <div class="card checkcontainer">
                <i class="far fa-calendar-check"></i>
              </div>
              <div class="card heartcontainer">
                  @if($event->interestedUsers->count()==0)
                      <button style="border:none; background-color:white; padding: 0 0 0 0;"
                      id="btnInterest{{ $event->id }}" class="far fa-heart"></button>
                      @else
                      <?php $onetime = 0; ?>
                      @foreach($event->interestedUsers as $interestedUser)
                          @if($interestedUser->id == auth()->id())
                              <button style="border:none; background-color:white; padding: 0 0 0 0;"
                              id="btnInterest{{ $event->id }}" class="fas fa-heart"></button>
                              <?php $onetime = 1; ?>
                          @endif

                      @endforeach
                      <?php if($onetime == 0)
                      {
                          echo '<button style="border:none; background-color:white; padding: 0 0 0 0;"
                          id="btnInterest{{ $event->id }}" class="far fa-heart"></button>';
                      }
                      ?>

                  @endif
              </div>
        @endif
        </div>
        <div class="row mr-3 ml-1">
            <p class="eventtitle">
                {{ $event->title }}
            </p>
        </div>
        <div class="row mr-3 ml-1">
            <p>
              <a href="/profiles/{{ $event->organizer_id }}">
                <span class="speaker font-weight-bold">by {{ $event->organizer->name }}</span>
              </a>
              <button class="btn follow font-weight-bold ml-2" type="button" name="button">Follow</button>
            </p>
        </div>
        <div class="row ml-1">
          <p class="card-text eventplace">
              {{ $event->location->place_name }}
          </p>
        </div>
        <span class="tag text-center">
            {{ $event->ticket_type }}
        </span>
        @if($event->location->owner_id == auth()->id())
            <button class="btn btnRegister font-weight-bold" type="button" name="button">Approve</button>
            @elseif($event->organizer_id == auth()->id())
            <button class="btn btnRegister font-weight-bold" type="button" name="button"
            onclick="window.location='/events/{{$event->id}}/edit';">Edit</button>
            @else
            <button class="btn btnRegister font-weight-bold" type="button" name="button"
            onclick="window.location='/events/{{$event->id}}/getTicket';">Get Ticket</button>
        @endif


      </div>
    </div>
  </div>
  <div class="container eventcard">
    <div class="row mt-5">
      <div class="col-1">

      </div>
      <div class="col-7">
        <p class="eventtitle" style="font-size : 20px;">
            {{ $event->title }}
        </p>
        <p class="eventtitle" style="font-size : 20px;">
            About this event
        </p>
        <p class="eventdescription">
            {{ $event->description }}
        </p>
      </div>
      <div class="col-3 mt-3">
        <p class="font-weight-bold">
          Date And Time
        </p>
        <p style="text-align: justify;" id="eventdate1">
            <script type="text/javascript">
                getProperDate("{{ $event->start_date }}", {{ $event->id }})
            </script>
          <br>
        </p>
        <p style="text-align: justify;" id="eventtime">
            <span id="eventstarttime"></span> to
            <span id="eventendtime"></span>
            <script type="text/javascript">
                tConvert("{{ $event->start_time }}" , "{{ $event->end_time }}")
            </script>

        </p>

        <p class="font-weight-bold">
          Location
        </p>
        <p style="text-align : justify;">
            {{ $event->location->place_name }} <br>
            {{ $event->location->address }}
            {{ $event->location->city }}
            {{ $event->location->state }}
            {{ $event->location->country }}
        </p>


      </div>
    </div>
    <div class="row mt-5" style="padding-bottom: 20px;">
      <div class="col-1">

      </div>
      <div class="col-10">

          <div id="map" style="width: 100%; height: 300px;">

          </div>
          <div id="infowindow-content">
            <img src="" width="16" height="16" id="place-icon">
            <span id="place-name"  class="title"> {{ $location->place_name }} </span><br>
            <span id="place-address"> {{ $location->place_address }} </span>
          </div>


      </div>
    </div>
  </div>
  <div class="container eventcard mt-5">
    <div class="row mt-1">
      <div class="col-1">
          @if(auth()->id()==$event->organizer_id)
            <a style="text-decoration: none; color: black; background-color: white; font-size: 14px;
            padding: 7px 7px 7px 7px; border-radius: 5px; border: 1px solid gray;"
            href="/events/{{ $event->id }}/upload" class="editprofile font-weight-bold ml-3">Upload</button></a>
          @endif
      </div>
      <div class="col-7">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="true">Video</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="powerpoint-tab" data-toggle="tab" href="#powerpoint" role="tab" aria-controls="powerpoint" aria-selected="false">Powerpoint</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="video" role="tabpanel" aria-labelledby="video-tab">
                @if($event->video_upload)
                    <video width="610px" height="367px" controls>
                      <source src="{{ $event->video() }}" type="video/mp4">
                    Your browser does not support the video tag.
                    </video>
                    @else
                    <img width="610px" height="367px" src="{{ $event->video() }}" alt="">
                    <span style="margin-left: 200px; font-size: 30px;" class="text-muted">Not Available</span>
                @endif
            </div>
            <div class="tab-pane fade" id="powerpoint" role="tabpanel" aria-labelledby="powerpoint-tab">
                @if($event->powerpoint_frame)
                    {!! $event->powerpoint_frame !!}
                    @else
                    <img width="610px" height="367px" src="{{ $event->video() }}" alt="">
                    <span style="margin-left: 200px; font-size: 30px;" class="text-muted">Not Available</span>
                @endif
            </div>
          </div>



      </div>
      <div class="col-4">
          @if($event->video_upload)
          <i class="fas fa-video"></i><a href="/events/{{ $event->id }}/upload/video" class="ml-3" style="text-decoration: underline;">{{ $event->title }}.mp4</a> <br>
            @else
            <span style=" font-size: 18px;" class="text-muted">Video Unavailable</span> <br>

          @endif
          @if($event->powerpoint_frame)
            <i class="fas fa-file-powerpoint"></i><a href="/events/{{ $event->id }}/upload/powerpoint" class="ml-4" style="text-decoration: underline;">{{ $event->title }}.ppt</a> <br>
            @else
            <span style=" font-size: 18px;" class="text-muted">Powerpoint Unavailable</span> <br>
          @endif
      </div>
    </div>
    <br><br>
  </div>
  <div class="container eventcard mt-5">
    <div class="row mt-1">
        <a style="margin:auto; width: 40%; font-size: 22px;" href="/events/{{ $event->id }}/posts">See what others are saying about this event</a>
    </div>
  </div>
  <script>

      $(document).ready(function(){

          $('#btnInterest{{ $event->id }}').click(function(){
              var query = {{ $event->id }};
              var _token = $('input[name="_token"]').val();
              $.ajax({
                  url:"{{ route('event.fetch.interest')}}",
                  method:"POST",
                  data:{query: query, _token: _token},
                  success:function(data){
                      if(data==1)
                      {
                          $('#btnInterest{{ $event->id }}').removeClass("far");
                          $('#btnInterest{{ $event->id }}').addClass("fas");
                      }
                      else {
                          $('#btnInterest{{ $event->id }}').removeClass("fas");
                          $('#btnInterest{{ $event->id }}').addClass("far");
                      }
                  }
              });
          });

      });
  </script>

  @include('layouts.simplemarker')
@endsection
