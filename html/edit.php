<?php include 'header.php';?>

<script>
	var data = <?php echo json_encode($user);?>
	for(key in data){ 
		data[key];
		document.getElementById(key).value = data[key];

	}
</script>

<div class="content">
	<div class="maincontent">
		<h1>Gegevens veranderen</h1>
		<br>
		<br>
		<form action='save_data' method='post'>
		<fieldset id="inputs">
			<li><p>Naam:</p><br><br>
			<input id="name" name="input[name]" type="text" placeholder="<?php echo $user->name; ?>"></p></li>
			<br>
			<select name="input[sex]">
			<option value="0" >Man</option>
			<option value="1" >Vrouw</option>
			</select>
			<br>
			<br>
			<li><p>Geboortedatum:</p><br><br>
			<input id="day" name="input[day]" type="day" size="2" maxlength="2" max="31" placeholder="Dag" >
			<input id="month" name="input[month]" type="month" size="5" maxlength="2" max="12" placeholder="Maand">
			<input id="year" name="input[year]" type="year" size="4" maxlength="4" max="1997" placeholder="Jaar" >
			<br>
			<li><p>Woonplaats:</p><br><br>
			<input id="city" name="input[city]" type="text" placeholder="<?php echo $user->city; ?>"></p></li>
			<br>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Gegevens opslaan"></p></li>
			</form>
			<br>
			<form action='delete_account' method='post'>
			<li><input type="submit" id="submit" value="Account verwijderen"></p></li>
			</form>
		</fieldset>	
		</form>
		
<?php if(isset($restaurant)){ ?>	
		<form action='edit' method='post'>	
		<fieldset id="inputs">
			<li><p>Naam Restaurant:</p><br><br>
			<p><input id="name" name="input[name]" type="text" placeholder="<?php echo $restaurant->name; ?>" ></p></li>
			<br>
			<li><p>Aantal tafels:</p><br><br>
			<p><input id="tables" name="input[tables]" type="number" placeholder="<?php echo $restaurant->tables; ?>" ></p></li>
			<br>
			<li><p>Website URL:</p><br><br>
			<p><input id="url" name="input[url]" type="text" placeholder="<?php echo $restaurant->url; ?>" ></p></li>
			<br>
			<p>Straat:</p>
			 <p><input id="street" name="input[street]" type="text" placeholder="<?php echo $restaurant->street; ?>" ></p></li>
			
			<p>Huisnummer:</p>
			 <p><input id="number" name="input[number]" type="text" size="4" placeholder="<?php echo $restaurant->number; ?>" ></p></li>
			<br>
			<br>
			<p>Postcode:</p>
			 <p><input id="zipcode" name="input[zipcode]" type="text" size="8" maxlength="6" placeholder="<?php echo $restaurant->zipcode ?>" ></p></li>			
			<p>Stad:</p>
			 <p><input id="city" name="input[city]" type="text" placeholder="<?php echo $restaurant->city; ?>" ></p></li>
			<br>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Gegevens opslaan"></p></li>
			<br>
			<li><input type="submit" id="submit" value="Account verwijderen"></p></li>
		</fieldset>	
		</form>
<?php } ?>
	</div>
</div>

<?php include 'footer.php';?>
