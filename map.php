<?php
extract($_REQUEST);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 80%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
<body>
    <div id="map"></div>
    
      <script>

      function initMap() {
        var myLatLng = {lat: <?php echo $lat; ?>, lng: <?php echo $lon; ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
      <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzfJHU7mKkVKW9nTVPymNY-0emhlP-0DQ&callback=initMap">
    </script>
    
    
</body>
</html>