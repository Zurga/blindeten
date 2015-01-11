<?php
include('model/class_map.php');

$map = new Map;
$map->get_geo_info();
?>
<html>
<head>
 <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head>
<body>
<div id='map'></div>
<script>
map = new google.maps.Map(document.getElementById('map'),{
	zoom: 3,
	center: new google.maps.LatLng(52, 4)
});
//create json from the model
var json = [ <?php foreach($map->markers as $marker){echo json_encode($marker) . ',';}?>]

for(i=0;i<json.length;i++){
	//create lonlat for each restaurant
	var latlon = new google.maps.LatLng(json[i].lat, json[i].lon);
	marker = new google.maps.Marker({
		position: latlon,
		map: map
		});
	infowindow = new google.maps.InfoWindow();

	//todo create icon for the marker
	//creating the popup for each restaurant
	google.maps.event.addListener(marker, 'click', (function(marker, i){
		return function(){
			infowindow.setContent(json[i].name);
			infowindow.open(map,marker);
		}
	})(marker, i));
}
//map.setCenter(lonlat, 14);

</script>
</body>
</html>
