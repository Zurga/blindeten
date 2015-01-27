<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<h1>Gegevens veranderen</h1>
		<br>
		<br>
		<form action="save_restaurant" method="post">	
		<fieldset id="inputs">
			<li><p>Naam Restaurant:</p><br><br>
			<p><input id="name" name="input['name']" type="text" placeholder="Naam Restaurant" ></p></li>
			<br>
			<li><p>Aantal tafels toevoegen*:</p><br><br>
			<p><input id="tables" name="input['tables']" type="number" placeholder="1,2,3 etc." ></p></li>
			<br>
			<li><p>Website URL:</p><br><br>
			<p><input id="url" name="input['url']" type="text" placeholder="www.mijnrestaurant.nl" ></p></li>
			<br>
			<li><p>Straat:</p><br><br>
			<p><input id="street" name="input['street']" type="text" placeholder="Straatnaam" ></p></li>
			<br>
			<li><p>Nummer:</p><br><br>
			<p><input id="number" name="input['number']" type="text" placeholder="Straatnummer" ></p></li>
			<br>
			<li><p>Postcode:</p><br><br>
			<p><input id="zipcode" name="input['zipcode']" type="text" placeholder="Postcode" ></p></li>
			<br>
			<li><p>Stad:</p><br><br>
			<p><input id="city" name="input['city']" type="text" placeholder="Stad" ></p></li>
			<br>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Gegevens opslaan"></p></li>
		</fieldset>	
		</form>
			 
	</div>
</div>

<script>
	var data = <?php echo json_encode(new Restaurant($user->owner));?>;
	
		document.getElementById("name").value = data["name"];
		
		document.getElementById("tables").value = "0";

		document.getElementById("url").value = data["url"];
	
		document.getElementById("street").value = data["street"];

		document.getElementById("number").value = data["number"];

		document.getElementById("zipcode").value = data["zipcode"];

		document.getElementById("city").value = data["city"];
</script>

<?php include 'footer.php';?>