<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<h1>Mijn reserveringen</h1>
		<?php foreach($bookings as $booking) ?>
		<br>
		<br>
		<p>Datum en Tijd: <?php echo $booking->time; ?></p>
		<p>Met: <?php if (is_null($booking->user2->id or $booking->user1->id)) {
		echo 'Er heeft nog niemand aangeschoven.';
		} else {if ($booking->user2->sex == 0) {
		echo 'Man ';
		} else {echo 'Vrouw';} echo $booking->user2->age();
		} ?> </p>
		<p>Restaurant: <?php $restaurant = new restaurant($booking->restaurant_id); echo $restaurant->name; ?></p>
		<br>
		<p><a href="editbooking.html" title="Reservering wijzigen">Reservering wijzigen</a></p>	
		<br>
	    <p><input type="submit" id="submit" value="Reservering verwijderen"></p>
		<?php } ?>
	</div>
</div>

<?php include 'footer.php';?>