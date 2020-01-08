
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgsIbxgXDcK-X8fV7WUG_EezNVoL50kww"></script>
    <div class="" style=" top: 250px; border-radius: 10px; position: fixed;">
        <div id="map" style="width: 400px; height: 400px;">

        </div>
    </div>


  <script type="text/javascript">
    var locations = [
        @foreach($locations as $location)

        [' <b style="font-weight: bold;"> {{ $location->name }} </b> <br> {{ $location->place_name }}', {{ $location->lat }}, {{ $location->lng }}, {{ $location->id }}],

        @endforeach

    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: new google.maps.LatLng(16.8559617762603, 96.13342353481676),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>
