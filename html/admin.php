<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
	
		<h1>Administratie</h1>
		<br>
		<br>
		<div id='admintab'>
			<ul>
				<li><a href="#tab1">Rechten aanpassen</a>
				</li>
				<li><a href="#tab2">Account verwijderen</a>
				</li>
				<li><a href="#tab3">Restaurant verwijderen</a>
				</li>
				<li><a href="#tab4">Restaurant toevoegen</a>
				</li>
			</ul>
			
			<div class="change_permission">
				<form action = "change_permission" method="POST">
					<input id="email" name="email" type="text" placeholder="E-mail" required>   
					<br>
					<select name="permission">
						<option value="0">Owner</option>
						<option value="1">Admin</option>
						<option value="2">User</option>
					</select>
					<br>
					<input type="submit" id="submit" value="Opslaan">
				</form>	
			</div>
			<div class="delete_account">					
				<form action="delete_account" method= "POST">
					<input id="email" name="email" type="text" placeholder="E-mail" required>   
					<br><br>
					<input type="submit" id="submit" value="Account verwijderen">
				</form>
			</div>
			<div class="delete_restaurant">
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
			<div class="add_restaurant">
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



http://krasimirtsonev.com/blog/article/GoogleMaps-JS-API-address-to-coordinates-transformation-text-to-LatLng


<?php include 'footer.php';?>