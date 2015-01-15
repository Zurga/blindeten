<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<h1>Gegevens veranderen</h1>
		<br>
		<br>
		<form>	
		<fieldset id="inputs">
			<li><p>Naam:</p><br><br>
			<input id="name" name="input['name']" type="text" placeholder="<?php $user->name ?>"></p></li>
			<br>
			<li><p><input type="radio" name="input['sex']" value="male" >Man</p></li>
		    <li><p><input type="radio" name="input['sex']" value="female" >Vrouw</p></li> 
			<br>
			<li><p>Geboortedatum:</p><br><br>
			<input id="birthdate" name="input['birthdate']" type="date" placeholder="Geboortedatum"></p></li>
			<br>
			<li><p>Woonplaats:</p><br><br>
			<input id="city" name="input['city']" type="text" placeholder="Woonplaats"></p></li>
			<br>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Gegevens opslaan"></p></li>
		</fieldset>	
		</form>
		
		<form>	
		<fieldset id="inputs">
			<li><p>Naam Restaurant:</p><br><br>
			<p><input id="name" name="input['name']" type="text" placeholder="<?php $restaurant->name ?>" ></p></li>
			<br>
			<li><p>Aantal tafels:</p><br><br>
			<p><input id="tables" name="input['tables']" type="number" placeholder="<?php $restaurant->tables ?>" ></p></li>
			<br>
			<li><p>Website URL:</p><br><br>
			<p><input id="url" name="input['url']" type="text" placeholder="<?php $restaurant-> url ?>" ></p></li>
			<br>
			<p>Straat:</p>
			 <p><input id="street" name="input['street']" type="text" placeholder="<?php $restaurant->street ?>" ></p></li>
			
			<p>Huisnummer:</p>
			 <p><input id="number" name="input['number']" type="text" size="4" placeholder="<?php $restaurant->number ?>" ></p></li>
			<br>
			<br>
			<p>Postcode:</p>
			 <p><input id="zipcode" name="input['zipcode']" type="text" size="8" maxlength="6" placeholder="<?php $restaurant->zipcode ?>" ></p></li>
			
			<p>Stad:</p>
			 <p><input id="city" name="input['city']" type="text" placeholder="<?php $restaurant->city ?>" ></p></li>
			<br>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Gegevens opslaan"></p></li>
		</fieldset>	
		</form>
	</div>
</div>

<?php include 'footer.php';?>