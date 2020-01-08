@extends('layouts/master')

@section('css')
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/map.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/feed.css') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection


@section('title')
    Events Feed
@endsection

@section('content')
<div id="headingbar">
    <header>
        <h1 style="color:#0277bd;">evenducate</h1>
        <h6 style="font-size:12px;">Your trusted event community</h6>
    </header>
</div>

<script type="text/javascript">

    function getProperDate(date, id)
    {
        var jsDate = new Date(Date.parse(date.replace('-','/','g')));
        console.log(date);
        console.log(jsDate);
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
<div class="cardbody">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 d-none d-xl-block"></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-7">
                <div class="row">
                    @foreach($events as $event)
                    @csrf
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 mt-5">
                        <a href="/events/{{ $event->id }}" style="text-decoration: none; color : black;">
                            <div class="card event">

                                <img class="card-img-top" width="100%" height="50%"
                                src="{{ $event->eventImage() }}" alt="Card image cap">

                                <div class="card-body eventbody">
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
                        </a>
                        @if($event->organizer_id !== auth()->id())
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
                            <div class="card checkcontainer">
                                <button style="border:none; background-color:white; padding: 0 0 0 0;" id="btnGoing{{ $event->id }}" class="far fa-calendar-check"
                                    onclick="window.location.href='/events/{{$event->id}}/getTicket'"
                                ></button>
                            </div>
                        @endif
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
                <br>
                {{ $events->links() }}
            </div>
            <div class="d-none d-lg-block col-lg-4 col-xl-3">
                @include('layouts.multiplemarker')
            </div>
        </div>

    </div>
</div>    


@endsection
