<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<form>
			
			<h1>Registreer</h1><br>
			<fieldset id="inputs">
				<input id="naam" type="text" placeholder="Naam" required>  
				<br>
				<br>
				<input id="email" type="text" placeholder="E-mail" required>   
				<br>
				<br>
				<input id="wachtwoord" type="password" placeholder="Wachtwoord" required>
				<br>
				<br>
				<input id="dag" type="day" size="2" maxlength="2" max="31" placeholder="Dag" required>
				<input id="maand" type="month" size="5" maxlength="2" max="12" placeholder="Maand" required>
				<input id="jaar" type="year" size="4" maxlength="4" max="1997" placeholder="Jaar" required>
				<br>
				<br>
				<input type="radio" name="sex" value="male" checked>Man
				<input type="radio" name="sex" value="female">Vrouw
			</fieldset>
			
			<fieldset id="actions">
				<br>
				<a href="">Wachtwoord vergeten?</a> 
				<br>
				<a href="login.html">Inloggen</a>
				<br>
				<br>
				<input type="submit" id="submit" value="Registreer">
			</fieldset>
		
		</form>
	</div>
<?php include 'header.php';?>