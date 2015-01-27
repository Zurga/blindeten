<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<h1>Mijn reserveringen</h1>
		<br>
		<br>
		<?php if(empty($bookings)) {
			echo '<p>Er zijn nog geen reserveringen.</p>';
		}
			else {
		foreach($bookings as $booking) { ?>	
		<p>Datum en Tijd: <?php echo $booking->date ; echo $booking->time; ?></p>
		<p>Met: <?php if (is_null($booking->user2->id or $booking->user1->id)) {
		echo 'Er heeft nog niemand aangeschoven.';
		} else {if ($booking->user2->sex == 0) {
		echo 'Man ';
		} else {echo 'Vrouw';} echo $booking->user2->age();
		} ?> </p>
		<p>Restaurant: <?php $restaurant = new restaurant($booking->restaurant_id); echo $restaurant->name; ?></p>
		<br>
		<p><a href="editbooking.php" title="Reservering wijzigen">Reservering wijzigen</a></p>	
		<br>
		<form action="/account/delete_booking" method="post">
		<input name="booking_id" value="<?php echo $booking->id; ?>" class="hidden">
	    <p><input type="submit" id="submit" value="Reservering verwijderen"></p>
		</form>
		<?php }} ?>
	</div>
</div>

<?php include 'footer.php';?>