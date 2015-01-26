<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<form action='register' onsubmit="return validateForm()" method='post'>
			
			<h1>Registreer</h1><br>
			<fieldset id="inputs" method='post'>
				<input id="name" name="input[name]" type="text" placeholder="Voornaam" required>  
				<br>
				<br>
				<input id="surname" name="input[surname]" type="text" placeholder="Achternaam" required>
				<br>
				<br>
				<input id="email" name="input[email]" type="text" placeholder="E-mail" required>   
				<br>
				<br>
				<input id="city" name="input[city]" type="text" placeholder="Woonplaats" required> 
				<br>
				<br>
				<input id="password" name="input[password]" type="password" placeholder="Wachtwoord" required>
				<br>
				<br>
				<input id="password" name="input[password]" type="password" placeholder="Herhaal wachtwoord" required>
				<br>
				<br>
				<input id="day" name="input[day]" type="day" size="4" maxlength="2" max="31" placeholder="Dag" required>
				<input id="month" name="input[month]" type="text" size="6" maxlength="2" max="12" placeholder="Maand" required>
				<input id="year" name="input[year]" type="year" size="4" maxlength="4" max="1997" placeholder="Jaar" required>
				<br>
				<br>
				<select name="input[sex]">
				<option value="0" >Man</option>
				<option value="1" >Vrouw</option>
				</select>
				<br>
			</fieldset>
			<fieldset id="actions">
				<br>
				<br>
				<input type="submit" id="submit" value="Registreer">
			</fieldset>
				<br>
				<br>
			<?php include 'freecap.php';?>
			<?php include 'freecap_wrap.php' ; ?>
		</form>
		</div>
	</div>
</div>	
<?php include 'footer.php';?>