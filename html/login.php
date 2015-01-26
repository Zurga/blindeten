<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<form action='set_login' method='post'>
			<h1>Log In</h1>
			<br>
			
			<fieldset id="inputs">
				<input id="email" name="email" type="text" placeholder="E-mail" required>   
				<br>
				<br>
				<input id="password" name="password" type="password" placeholder="Wachtwoord" required>
			</fieldset>
			
			<fieldset id="actions">
				<br>
				<a href="forgot_password.php">Wachtwoord vergeten?</a> 
				<br>
				<a href="/account/register.php">Registreren</a>
				<br>
				<br>
				<input type="submit" id="submit" value="Log in">
			</fieldset>
		</form>
	<?php if(isset($error)) {
			echo '<p>' . $error .'</p>';
		} ?> 	
	</div>
</div>
<?php include 'footer.php';?>
