<?php include 'header.php';?>

<div id="content">
	
	<div id="wrapper">
	
	<div class="homemap">
		<h1> Selecteer een restaurant:<h1>
		<div id='map'>
	</div>
		</div>
	<div class="sidecontent">
		<h1>Reserveer hier:</h1><br>
		
		<ul>
		<?php foreach ($restaurants as $restaurant) {
			echo "<li>";
			echo '<h2><a href="javascript:showtext('.$restaurant->id.');">'.$restaurant->name.'</a><h2><br>';
			echo '<div id="'.$restaurant->id.'" class="hidden" style="display:none">';
			echo $restaurant->street." ";
			echo $restaurant->number."<br>";
			echo $restaurant->zipcode." ";
			echo $restaurant->city."<br>"; 
			echo '<a href="'.$restaurant->url.'">'.$restaurant->url.'</a><br><br></div>';
			echo "</li>";
		}  ?> 
	</ul>
	</div>
	</div>
	</div>


<script type="text/javascript">
		function showtext(id){
   			
   			if(document.getElementById(id).style.display == 'none'){
      		document.getElementById(id).style.display = 'block';
   			}
   		
   		else{
      	document.getElementById(id).style.display = 'none';      
   		}
		}
		</script>

<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
<script scr="/js/functions.js"></script>
<script>
map = new google.maps.Map(document.getElementById('map'),{
	zoom: 3,
	center: new google.maps.LatLng(52, 4)
});
//create json from the model
var json = [ <?php foreach($restaurants as $marker){echo json_encode($marker) . ',';}?>];

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
			restaurant = json[i].id;
			//get_output('calendar', restaurant); 
			showtext(restaurant);


		}
	})(marker, i));
}
map.setCenter(latlon);
map.setZoom(12);
</script>
		
<?php include 'footer.php' ?>
