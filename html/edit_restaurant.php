<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<h1>Gegevens veranderen</h1>
		<br>
		<br>
		<form>	
		<fieldset id="inputs">
			<li><p>Naam Restaurant:</p><br><br>
			<p><input id="name" name="input['name']" type="text" placeholder="Naam Restaurant" ></p></li>
			<br>
			<li><p>Aantal tafels:</p><br><br>
			<p><input id="tables" name="input['tables']" type="number" placeholder="1,2,3 etc." ></p></li>
			<br>
			<li><p>Website URL:</p><br><br>
			<p><input id="url" name="input['url']" type="text" placeholder="www.mijnrestaurant.nl" ></p></li>
			<br>
			<li><p>Locatie Restaurant:</p><br><br>
			<p><input id="location" name="input['location']" type="text" placeholder="Het adres" ></p></li>
			<br>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Gegevens opslaan"></p></li>
		</fieldset>	
		</form>
			 
	</div>
</div>

<?php include 'footer.php';?>