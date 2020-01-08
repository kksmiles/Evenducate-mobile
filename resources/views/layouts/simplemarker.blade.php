<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgsIbxgXDcK-X8fV7WUG_EezNVoL50kww"></script>
  <script>
    // In this example, we center the map, and add a marker, using a LatLng object
    // literal instead of a google.maps.LatLng object. LatLng object literals are
    // a convenient way to add a LatLng coordinate and, in most cases, can be used
    // in place of a google.maps.LatLng object.

    var map;
    function initialize() {
      var mapOptions = {
        zoom: 17,
        center: {lat: {{ $location->lat }}, lng: {{ $location->lng }}}
      };
      map = new google.maps.Map(document.getElementById('map'),
          mapOptions);

      var marker = new google.maps.Marker({
        // The below line is equivalent to writing:
        // position: new google.maps.LatLng(-34.397, 150.644)
        position: {lat: {{ $location->lat }}, lng: {{ $location->lng }}},
        map: map
      });


      // You can use a LatLng literal in place of a google.maps.LatLng object when
      // creating the Marker object. Once the Marker object is instantiated, its
      // position will be available as a google.maps.LatLng object. In this case,
      // we retrieve the marker's position using the
      // google.maps.LatLng.getPosition() method.
      var infowindow = new google.maps.InfoWindow();
      var infowindowContent = document.getElementById('infowindow-content');
      infowindow.setContent(infowindowContent);
      infowindow.open(map, marker);
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
      });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
