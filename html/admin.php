<?php include 'header.php';?>

<!-- source for tabs: http://www.webhostingtalk.com/showthread.php?t=1045871-->

<div class="content">
	<div class="maincontent">
		<h1>Administratie</h1>
		<br>
		<br>
		<div id="Tabs">
			<ul>
				<li id="tab_one" OnClick="tab('tab1')"><a>Gebruiker</a></li> 
				<li id="tab_two" OnClick="tab('tab2')"><a>Restaurants</a></li>
			</ul>
	
			<div id="tab_content">
			
				<div id="tab1">
					<b><h2>Verander permissie van gebruiker:</h2></b>
					<form action = "change_permission" method="POST" id= "admin_form">
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

					<b><h2>Verwijderen van account:</h2></b>
					<form action="delete_account" method= "POST" id="admin_form">
					<input id="email" name="email" type="text" placeholder="E-mail" required>   
					<br><br>
					<input type="submit" id="submit" value="Account verwijderen">
					</form>
				</div>
			
				<div id="tab2" style="display:none">
					
					<b><h2>Toevoegen restaurant:</h2></b>
					<form action = "add_restaurant" method= "POST" id="admin_form">
					<input id="name" name='input["name"]' type="text" placeholder="Naam restaurant" required>
					<input id="street" name='input["street"]' type="text" placeholder="Straatnaam" required>
					<input id="number" name='input["number"]' type="number" placeholder="Nummer" required>
					<input id="zipcode" name='input["zipcode"]' type="text" placeholder="1234AB" required>
					<input id="city" name='input["city"]' type="text" placeholder="Stad" required>
					<input id="url" name='input["url"]' type="text" placeholder="URL" required>
					<input id="lat" name='input["lat"]' type="text" placeholder="Lat" required>
					<input id="lon" name='input["lon"]' type="text" placeholder="Lon" required>
					<br><br>
					<input type="submit" id="submit" value="Toevoegen">
					</form>	

					<b><h2>Verwijder restaurant</h2></b>
					<form action = "delete_restaurant" method= "POST" id="admin_form">
					<select name="rest_id">
						<?php 
						foreach($restaurants as $restaurant){
						echo '<option value ='.$restaurant->id.'>'.$restaurant->name.'</option>';
						} ?>
					</select>
					<br><br>
					<input type="submit" id="submit" value="Verwijder">
					</form>
				</div>
		
			

			</div>
		
		</div>
	</div>		
</div>

<script type="text/javascript">
function tab(tab) {
document.getElementById('tab1').style.display = 'none';
document.getElementById('tab2').style.display = 'none';
document.getElementById('tab_one').setAttribute("class", "");
document.getElementById('tab_two').setAttribute("class", "");
document.getElementById(tab).style.display = 'block';
document.getElementById('tab_'+tab).setAttribute("class", "active");
}
</script>


<?php include 'footer.php';?>