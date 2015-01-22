<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<form action='login.php' method='post'>
			<h1>Administratie</h1>
			<br>
			
			
			<fieldset id="inputs">
				<form action = "change_permission" method="POST">
					<input id="email" name="input[email]" type="text" placeholder="E-mail" required>   
					<br>
					<br>
					<select>
			    	<option value="Owner">Owner</option>
			    	<option value="Admin">Admin</option>
			    	<option value="User">User</option>
			    	</select>
					<br>
					<br>
					<input type="submit" id="submit" value="Opslaan">
				</form>
				
				<br>
				<br>
				<br>
				
				<form action="delete_account" method= "POST">
					<input id="email" name="input[email]" type="text" placeholder="E-mail" required>   
					<br>
					<br>
					<input type="submit" id="submit" value="Account verwijderen">
				</form>

				<form action = "delete_restaurant" method= "POST">
					<input id="restaurant_name" name="input[restaurant_name]" type="text" placeholder="Naam restaurant" required>	
					<input type="submit" id="submit" value="Verwijder">
				</form>

				<form action = "add_restaurant" method= "POST">
					<input id="restaurant_name" name="input[restaurant_name]" type="text" placeholder="Naam restaurant" required>
					<input type="submit" id="submit" value="Toevoegen">
				</form>	
			
			</fieldset>
		</form>
	</div>
</div>

<?php include 'footer.php';?>