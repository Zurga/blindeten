<?php include 'header.php';?>
	
<div class="content">
	<div class="maincontent">
		<h1>Gegevens veranderen</h1>
		<br>
		<br>
		<form>	
		<fieldset id="inputs">
			<li><p>Naam:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><input id="naam" type="text" placeholder="Naam" required></p></li>
			<br>
			<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p><input type="radio" name="sex" value="male" >Man</p></li>
		    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p><input type="radio" name="sex" value="female" >Vrouw</p></li> 
			<br>
			<li><p>Geboortedatum:</p><input id="geboortedatum" type="date" placeholder="Geboortedatum" required></p></li>
			<br>
			<li><p>Woonplaats:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><input id="woonplaats" type="text" placeholder="Woonplaats" required></p></li>
			<br>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Gegevens opslaan"></p></li>
		</fieldset>	
		</form>
			 
	</div>
</div>
<?php include 'footer.php';?>