<?php include 'header.php';?>
<div class="content">
	<div class="maincontent">
		<h1>Wachtwoord vergeten</h1>
		<br>
		<br>
		<form action= "forgot_password" method= "post">	
		<fieldset id="inputs">
			<li><p>E-mail:&nbsp;&nbsp;</p><input id="email" name="input[email]" type="text" placeholder="E-mail" required></li>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Verstuur e-mail"></li>
		</fieldset>	
		</form>
			 
	</div>
</div>
<?php include 'footer.php';?>