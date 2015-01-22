<?php include 'header.php';?>
		
<div class="content">
	<div class="maincontent">
		<h1>Wachtwoord veranderen</h1>
		<br>
		<br>
		<form action="save_new_password" method="post">	
		<fieldset id="inputs">
			<li><p>Huidig wachtwoord:&nbsp;&nbsp;</p><input id="current_password" name="password" type="password" placeholder="Huidig wachtwoord" required></li>
			<br>
			<li><p>Nieuw wachtwoord:&nbsp;&nbsp;</p><input id="new_password" name="new_password"type="password" placeholder="Nieuw wachtwoord" required></li> 
			<br>
			<li><p>Herhaal wachtwoord:</p><input id="repeat_pasword" name="repeat_password" type="password" placeholder="Wachtwoord herhalen" required></li>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Wachtwoord opslaan"></li>
		</fieldset>	
		</form>
			 
	</div>
</div>

<?php include 'footer.php';?>