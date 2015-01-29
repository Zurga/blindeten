<?php include 'header.php';?>
<div id="content">
	
	<div id="wrapper">
	<div class="homemap">
		<h1> Selecteer een restaurant:</h1>
		<br><br>
		<div id='map' >
	</div>
		</div>
	<div class="sidecontent">
		<h1>Reserveer hier:</h1>
		<br>
		<ul>
		<?php foreach ($restaurants as $restaurant) {
			echo "<li>";
			echo '<h2><a href="javascript:showtext('.$restaurant->id.",'calendar'".');">'.$restaurant->name.'</a></h2><br>';
			echo '<div id="'.$restaurant->id.'" class="hidden" style="display:none">';
			echo $restaurant->street." ";
			echo $restaurant->number."<br>";
			echo $restaurant->zipcode." ";
			echo $restaurant->city."<br>"; 
			echo '<a target="_blank" href="'.$restaurant->url.'">Website</a><br><br><br>';
			echo '<input id="' . $restaurant->id . '-input" name="date"  style="visibility:hidden"></input>';
			echo '<ul id="bookings-' . $restaurant->id. '"></ul>';
			echo '</div>';
			echo "</li>";
		}  ?> 
	</ul>
	</div>
	</div>
	</div>

<script>
//create rest from the model
var rest = { <?php foreach($restaurants as $restaurant){
	echo $restaurant->id . ':'. json_encode($restaurant) . ',';}?>};

</script>
		
<?php include 'footer.php' ?>
