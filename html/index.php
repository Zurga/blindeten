<?php include 'header.php';?>
<script>
function showtext(id){
	if(document.getElementById(id).style.display == 'none'){
      		document.getElementById(id).style.display = 'block';
      		elements = document.getElementsByClassName("hidden");
   		for (var i = 0; i < elements.length; i++) {
    			if (elements[i].id != id) {
    				elements[i].style.display = "none";	
    			}
		}
   	}
   	else{
      		document.getElementById(id).style.display = 'none';      
   	}
}

function get_calendar(id){
	calendardiv = document.getElementById(id).getElementsByClassName("JsDatePickBox");
	if(calendardiv.length == 0){
		calendar = new JsDatePick({
        	useMode:1,
        	isStripped:true,
        	target: id,
	  	cellColorScheme:"ocean_blue"}); 
    		calendar.setOnSelectedDelegate(function(){
        		var obj = calendar.getSelectedDay();
        		get_output("calendar", id);
    
        	alert("a date was just selected and the date is : " + obj.day + "/" + obj.month + "/" + obj.year);
    		});
	} 
}

// Get the HTTP Object
function get_http_object(){
	if (window.ActiveXObject) 
		return new ActiveXObject("Microsoft.XMLHTTP");
        else if (window.XMLHttpRequest) 
	     	return new XMLHttpRequest();
        else {
		alert("Your browser does not support AJAX.");
		return null;
        }
}
function get_output(which, input){
	http_object = get_http_object();
	if (http_object != null){
		http_object.open('GET', "ajax/"+ which + "?input=" + input,
				true);
		http_object.send(null);
		http_object.onreadystatechange = set_output(input);
	}
}

function set_output(id){
	if(http_object.ready_state == 4){
		document.getElementById(id).innerHtml = http_object.responseText;
	}
}	

</script>
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
			echo '<h2><a href="javascript:showtext('.$restaurant->id.');get_calendar('.$restaurant->id.');">'.$restaurant->name.'</a></h2><br>';
			echo '<div id="'.$restaurant->id.'" class="hidden" style="display:none">';
			echo $restaurant->street." ";
			echo $restaurant->number."<br>";
			echo $restaurant->zipcode." ";
			echo $restaurant->city."<br>"; 
			echo '<a target="_blank" href="'.$restaurant->url.'">Website</a>';
			echo '</div>';
			echo "</li>";
		}  ?> 
	</ul>
	</div>
	</div>
	</div>

<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
<!--script src="/js/functions.js"></script-->
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
