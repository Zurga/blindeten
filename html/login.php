<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<form>
			<h1>Log In</h1>
			<br>
			
			<fieldset id="inputs">
				<input id="email" type="text" placeholder="E-mail" required>   
				<br>
				<br>
				<input id="wachtwoord" type="password" placeholder="Wachtwoord" required>
			</fieldset>
			
			<fieldset id="actions">
				<br>
				<a href="wachtwoordvergeten.html">Wachtwoord vergeten?</a> 
				<br>
				<a href="registreer.html">Registreren</a>
				<br>
				<br>
				<input type="submit" id="submit" value="Log in">
			</fieldset>
		</form>
	</div>
<?php include 'footer.php';?>