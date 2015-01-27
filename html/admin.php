<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
	
		<h1>Administratie</h1>
		<br>
		<br>
		<div class='admintab'>
			<div class="tab">
				<input type="radio" id="tab1" checked>
				<label for="tab1">Rechten wijzigen</input>
				<div class="tabcontent">
					<form action = "change_permission" method="POST">
						<input id="email" name="email" type="text" placeholder="E-mail" required>   
						<br>
						<select name="permission">
							<option value="0">Owner</option>
							<option value="1">Admin</option>
							<option value="2">User</option>
						</select>
						<br><br>
						<input type="submit" id="submit" value="Opslaan">
					</form>	
				</div>
			</div>
			<div class="tab">
				<input type="radio" id="tab2">
				<label for="tab2">Account verwijderen</input>
				<div class="tabcontent">
					<form action="delete_account" method= "POST">
						<input id="email" name="email" type="text" placeholder="E-mail" required>   
						<br><br>
						<input type="submit" id="submit" value="Account verwijderen">
					</form>
				</div>
			</div>
			<div class="tab">
				<input type="radio" id="tab3">
				<label for="tab2">Restaurant verwijderen</input>
				<div class="tabcontent">
					<form action = "delete_restaurant" method= "POST">
						<select name="rest_id">
						<?php 
						foreach($restaurants as $restaurant){
							echo '<option value ='.$restaurant->id.'>'.$restaurant->name.'</option>';
						} ?>
						</select>
						<!--<input id="restaurant_name" name="restaurant_name" type="text" placeholder="Naam restaurant" required>-->
						<br><br>
						<input type="submit" id="submit" value="Verwijder">
					</form>
				</div>
			</div>
			<div class="tab">
				<input type="radio" id="tab4">
				<label for="tab4">Restaurant toevoegen</input>
				<div class="tabcontent">
					<form action = "add_restaurant" method= "POST">
						<input id="name" name='input["name"]' type="text" placeholder="Naam restaurant" required>
						<input id="street" name='input["street"]' type="text" placeholder="Straatnaam" required>
						<input id="number" name='input["number"]' type="number" placeholder="Nummer" required>
						<input id="lat" name='input["lat"]' type="text" placeholder="Lat" required>
						<input id="lon" name='input["lon"]' type="text" placeholder="Lon" required>
						

						<input id="zipcode" name='input["zipcode"]' type="text" placeholder="1234AB" required>
						<input id="city" name='input["city"]' type="text" placeholder="Stad" required>
						<!--<input id="email" name="email" type="text" placeholder="E-mail vd eigenaar"> -->
						<input id="url" name='input["url"]' type="text" placeholder="URL" required>

						<br><br>
						<input type="submit" id="submit" value="Toevoegen">
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
			$('#navigation ul a').click(function(){
				$('#navigation ul a').removeClass('selected');
				$(this).addClass('selected');
				$('#content_changer').html('You have selected '+ $(this).html());
			});
		});
</script>
http://krasimirtsonev.com/blog/article/GoogleMaps-JS-API-address-to-coordinates-transformation-text-to-LatLng


<?php include 'footer.php';?>