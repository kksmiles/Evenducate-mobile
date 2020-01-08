@extends('layouts.master')

@section('css')

@endsection

@section('title')
    Notifications
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

    <header>
              <h1 style="color:#0277bd;">dd</h1>
    </header>
    
@endsection
