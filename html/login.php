<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
			<h1>Log In</h1>
			<?php if(isset($error)) {
			echo '<p class="error">' . $error .'</p>';
			} ?> 
		<form action='set_login' method='post'>
			<fieldset id="inputs">
				<input id="email" name="email" type="text" placeholder="E-mail" required>   
				<input id="password" name="password" type="password" placeholder="Wachtwoord" required>
			</fieldset>
			
				<p><a href="forgot_password.php">Wachtwoord vergeten?</a></p>
				<p><a href="/account/register.php">Registreren</a></p>
				<input type="submit" id="submit" value="Log in">
		</form>
	</div>
</div>
<?php include 'footer.php';?>
