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
//create json from the model
var json = [ <?php foreach($map->markers as $marker){echo json_encode($marker) . ',';}?>]
var markers = new OpenLayers.Layer.Markers("Restaurants");
map.addLayer(markers);
var popup_size = new OpenLayers.Size(200, 200);

for(i=0;i<json.length;i++){
	//create lonlat for each restaurant
	var lonlat = new OpenLayers.LonLat(json[i]['lon'], json[i]['lat'])
		.transform( new OpenLayers.Projection("EPSG:4326"),
			map.getProjectionObject()
		);
	marker = new OpenLayers.Marker(lonlat);
	marker.id = json[i].id;
	marker.name = json[i].name
	//creating the popup for each restaurant
	marker.events.register("click", marker, function(e){
		popups = document.getElementsByClassName('olPopup');
		//hide all other popups
		for(i = 0; i<popups.length; i++){
			popups[i].style.display = 'none';
		}
		//check if the popup exists in the html
		pop = document.getElementById(this.id);
		if (pop != null){
			//show the popup
			pop.style.display = '';
		}
		else{	//create new popup
			var popup = new OpenLayers.Popup.FramedCloud(this.id, 
				this.lonlat, popup_size, 
				"<div style='width: 26px; height:20px;'>" +  
				"Text</div>", null, true);
			map.addPopup(popup)
		}
	});
	markers.addMarker(marker);
}
map.setCenter(lonlat, 14);

</script>
</body>
</html>
