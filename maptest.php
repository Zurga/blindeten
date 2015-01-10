<?php
include('model/class_map.php');

$map = new Map;
$map->get_geo_info();
?>
<html>
<head>
<script src='http://openlayers.org/api/OpenLayers.js'></script>
</head>
<body>
<div id='Map'></div>
<script>
map = new OpenLayers.Map('Map');
map.addLayer(new OpenLayers.Layer.OSM());

var json = [ <?php foreach($map->markers as $marker){echo json_encode($marker) . ',';}?>]
var markers = new OpenLayers.Layer.Markers("Restaurants");
map.addLayer(markers);
for(i=0;i<json.length;i++){
	var lonlat = new OpenLayers.LonLat(json[i]['lon'], json[i]['lat'])
		.transform( new OpenLayers.Projection("EPSG:4326"),
			map.getProjectionObject()
		);
	markers.addMarker(new OpenLayers.Marker(lonlat));
	var popup = new OpenLayers.Popup.FramedCloud("Popup", lonlat, null, 
		json[i]['name'] + json[1]['url'], true);
	map.addPopup(popup, false);
	
}
map.setCenter(lonlat, 14);
</script>
</body>
</html>
