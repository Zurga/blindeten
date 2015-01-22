<?php include 'header.php';?>



<div class="content">
	<div class="maincontent">
	
		<h1>Administratie</h1>
		<br>
		<form action = "change_permission" method="POST">
			<input id="email" name="email" type="text" placeholder="E-mail" required>   
			<br>
			<br>
			<select name="permission">
				<option value="0">Owner</option>
				<option value="1">Admin</option>
				<option value="2">User</option>
			</select>
			<br>
			<br>
			<br>
			<input type="submit" id="submit" value="Opslaan">
		</form>			
								
		<form action="delete_account" method= "POST">
			<input id="email" name="email" type="text" placeholder="E-mail" required>   
			<br>
			<br>
			<input type="submit" id="submit" value="Account verwijderen">
		</form>

		<form action = "delete_restaurant" method= "POST">
			<select name="rest_id">
			<?php 
			foreach($restaurants as $restaurant){
				echo '<option value ='.$restaurant->id.'>'.$restaurant->name.'</option>';
			} ?>
			</select>
			<input id="restaurant_name" name="restaurant_name" type="text" placeholder="Naam restaurant" required>	
			<br><br>
			<input type="submit" id="submit" value="Verwijder">
		</form>

		<form action = "add_restaurant" method= "POST">
			<input id="restaurant_name" name="restaurant_name" type="text" placeholder="Naam restaurant" required>
			<br><br>
			<input type="submit" id="submit" value="Toevoegen">
		</form>	
</div>


<?php include 'footer.php';?>