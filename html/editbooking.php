<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<h1>Booking wijzigen</h1>
		<br>
		<br>
		<form action="save_editbooking" method="post">	
		<fieldset id="inputs">
			<li><p>Datum: </p>
			<p><input id="date" name="input[date]" type="date"> </p></li>
			<br>
			<li><p>Tijd: </p>
			<p><select id="time" name="input[time]">
				<option value="18:00:00">18:00</option>
				<option value="20:00:00">20:00</option>
			</select><p><li>
			<?php if(isset($message)){
				echo '<p class="error">' . $message .'</p>';
				}
				if(isset($error_message)){
				echo '<p class="error">' . $error_message .'</p>';
				}
			?>	
			<br>
			<br>
			<li><input type="submit" id="submit" value="Gegevens opslaan"></p></li>
		</fieldset>	
		</form>
    </div>
</div>

<script>
	var data = <?php echo json_encode($booking);?>;

		document.getElementById("date").value = data["date"];

		document.getElementById("time").value = data["time"];
	
</script>

<?php include 'footer.php';?>