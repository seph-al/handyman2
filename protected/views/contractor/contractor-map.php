<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<div id="map" style="height: 400px; width: 600px; margin-top: 0.6em; border: 1px solid #CCC; margin-bottom: 10px;"></div>

<script type="text/javascript">
  var locations = [];
 
  locations.push(<?php echo json_encode($point)?>);

  var position = new google.maps.LatLng(<?php echo $map_location[0]?>,<?php echo $map_location[1]?>);
  var mapOptions = {
    center: new google.maps.LatLng(<?php echo $map_location[0]?>,<?php echo $map_location[1]?>),
    zoom: 17,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById('map'),mapOptions);

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
 