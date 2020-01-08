@extends('layouts.master')

@section('css')
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/feed.css') }}">
@endsection

@section('title')
    Browse Events
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
        var output = d + ", " + m + " " + n;
        document.getElementById("eventdate"+id).innerHTML = output;
    }


</script>

<div class="container">
    <div class="row">
       <div id="events">
         @csrf
         <input type="text" class="searchinput font-weight-bold" name="event_name" id="event_name" placeholder="Search events">
           <div id="eventList">

           </div>
       </div>
    </div>
    <div class="row mt-1">
      <p class="font-weight-bold">
        <span style="color: #EB5438; font-size: 1.7rem;">In</span>
        <input type="text" class="searchinput font-weight-bold ml-3" name="place" value="Yangon">
      </p>
      <button class="btn searchbutton font-weight-bold " type="button" name="btnSearch">Search</button>
    </div>
    <div class="row mt-3">
      <select class="sdropdown font-weight-bold" style="border-color: #4286F4;">
        <option value="anydate">Any Date</option>
        <option value="today">Today</option>
        <option value="tomorrow">Tomorrow</option>
        <option value="thisweek">This Week</option>
        <option value="thisweekend">This Weekend</option>
        <option value="thismonth">This Month</option>
        <option value="nextmonth">Next Month</option>
        <option value="nextmonth">Pick a date</option>
      </select>
      <select class="sdropdown ml-3 font-weight-bold">
        <option value="Any Category">Tag</option>
        <option value="ceremony">Ceremony</option>
        <option value="workshop">Workshop</option>
        <option value="studyjam">Study Jam</option>
        <option value="opening">Opening</option>
        <option value="attraction">Attraction</option>
        <option value="conference">Conference</option>
        <option value="seminar">Seminar</option>
      </select>
      <select class="sdropdown ml-3 font-weight-bold" style="border-color: #F4BC07;">
        <option value="Price">Price</option>
        <option value="free">Free</option>
        <option value="paid">Paid</option>
      </select>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-7">
            @foreach($events as $event)
                <div class="row">
                    <div class="col-12">
                        <a href="/events/{{ $event->id }}" style="text-decoration: none; color : black;">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-4 mt-3">
                                        <img src="{{ $event->eventImage() }}" class="card-img" alt="...">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">

                                          <h5 class="eventdate" id="eventdate{{ $event->id }}">
                                              <script type="text/javascript">
                                                  getProperDate("{{ $event->start_date }}", {{ $event->id }})
                                              </script>
                                          </h5>
                                            <p class="eventtitle">
                                                {{ $event->title }}
                                            </p>
                                            <p class="card-text eventplace">
                                                {{ $event->location->place_name }}
                                            </p>
                                            <span class="tag text-center">
                                                {{ $event->ticket_type }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @if($event->organizer_id !== auth()->id())
                            <div class="card heartcontainerbrowse">
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
                            <div class="card checkcontainerbrowse">
                                <button style="border:none; background-color:white; padding: 0 0 0 0;" id="btnGoing{{ $event->id }}" class="far fa-calendar-check"
                                    onclick="window.location.href='/events/{{$event->id}}/getTicket'"
                                ></button>
                            </div>
                        @endif
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

            @endforeach
        </div>
        <div class="col-lg-4 ml-5 d-none d-lg-block">
            @include('layouts.multiplemarker')
        </div>
    </div>
</div>
<script>

    $(document).ready(function(){


        $('#event_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.fetch.events') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#eventList').fadeIn();
               $('#eventList').html(data);
              }
             });
            }
        });


        $(document).on('click', '#eventitem', function(){
            $('#event_name').val($(this).text());
            $('#event_id').val($(this).data('value'));
            $('#eventList').fadeOut();
        });

    });
</script>
@endsection
