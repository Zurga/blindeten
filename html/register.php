<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<form>
			
			<h1>Registreer</h1><br>
			<fieldset id="inputs">
				<input id="name" name="input['name']" type="text" placeholder="Naam" required>  
				<br>
				<br>
				<input id="email" name="input['email']" type="text" placeholder="E-mail" required>   
				<br>
				<br>
				<input id="password" name="input['password']" type="password" placeholder="Wachtwoord" required>
				<br>
				<br>
				<input id="password" name="input['password']" type="password" placeholder="Herhaal wachtwoord" required>
				<br>
				<br>
				<input id="day" name="input['day']" type="day" size="2" maxlength="2" max="31" placeholder="Dag" required>
				<input id="month" name="input['month']" type="month" size="5" maxlength="2" max="12" placeholder="Maand" required>
				<input id="year" name="input['year']" type="year" size="4" maxlength="4" max="1997" placeholder="Jaar" required>
				<br>
				<br>
				<input type="radio" name="input['sex']" value="male" checked>Man
				<input type="radio" name="input['sex']" value="female">Vrouw
			</fieldset>
			
			<fieldset id="actions">
				<br>
				<a href="login.php">Inloggen</a>
				<br>
				<br>
				<input type="submit" id="submit" value="Registreer">
			</fieldset>
		
		</form>
	</div>
<?php include 'footer.php';?>