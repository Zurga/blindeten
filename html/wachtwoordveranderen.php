<?php include 'header.php';?>
		
<div class="content">
	<div class="maincontent">
		<h1>Wachtwoord veranderen</h1>
		<br>
		<br>
		<form>	
		<fieldset id="inputs">
			<li><p>Huidig wachtwoord:&nbsp;&nbsp;</p><input id="huidigwachtwoord" type="password" placeholder="Huidig wachtwoord" required></li>
			<br>
			<li><p>Nieuw wachtwoord:&nbsp;&nbsp;</p><input id="nieuwwachtwoord" type="password" placeholder="Nieuw wachtwoord" required></li> 
			<br>
			<li><p>Herhaal wachtwoord:</p><input id="wachtwoordherhalen" type="password" placeholder="Wachtwoord herhalen" required></li>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Wachtwoord opslaan"></li>
		</fieldset>	
		</form>
			 
	</div>
</div>

<?php include 'footer.php';?>