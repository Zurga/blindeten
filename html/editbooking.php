<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<h1>Booking wijzigen</h1>
		<br>
		<br>
		<form>	
		<fieldset id="inputs">
			<li><p>Datum en tijd: </p><br><br>
			<input id="date" name="input[date]" type="date" placeholder="<?php $bookings->time ?>"></p></li>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Gegevens opslaan"></p></li>
		</fieldset>	
		</form>
    </div>
</div>
		
<?php include 'footer.php';?>