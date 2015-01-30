<?php include 'header.php';?>
		
<div class="content">
	<div class="maincontent">
		<h1>Wachtwoord veranderen</h1>
		<?php if(isset($password_error)) {
					echo '<p class="error">' . $password_error .'</p>';
				}
		?>
		<form action="save_new_password" method="post">	
		<fieldset id="inputs">
			<li><p>Huidig wachtwoord:&nbsp;&nbsp;</p><input id="current_password" name="cur_password" type="password" placeholder="Huidig wachtwoord" required></li>
			<li><p>Nieuw wachtwoord:&nbsp;&nbsp;</p><input id="password" name="password" type="password" placeholder="Wachtwoord" pattern=".{6,}" title="Minimaal 6 tekens" required>
			<li><p>Herhaal wachtwoord:</p><input id="check_password" name="check_password" type="password" onkeyup="checkPass();" placeholder="Herhaal wachtwoord" required>
			<br>
			<p id="error" class="error"></p>
			<li><input type="submit" id="submit" value="Wachtwoord opslaan" OnClick="return match;"></li>
		</fieldset>	
		</form>
			 
	</div>
</div>

<?php include 'footer.php';?>
