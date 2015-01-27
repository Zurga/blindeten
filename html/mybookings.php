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
		<p>Datum en Tijd: <?php echo $booking->date,' ', substr($booking->time, 0, 5); ?></p>
		<p>Met: <?php if($booking->user1->age() == 0 or $booking->user2->age() == 0) {
		echo 'Er is nog niemand aangeschoven.';
		} else {if($booking->user2->id == $user->id){ 
		  if ($booking->user1->sex == 0) {
		echo 'Man ';
		} else {echo 'Vrouw';} echo $booking->user1->age(); 
		}
		else if($booking->user1->id == $user->id){ 
		  if ($booking->user2->sex == 0) {
		echo 'Man ';
		} else {echo 'Vrouw';} echo $booking->user2->age(); 
		} ?> </p>
		<p>Restaurant: <?php $restaurant = new restaurant($booking->restaurant_id); echo $restaurant->name; ?></p>
		<br>
		<form action="/account/edit_booking" method="post">
		<input name="booking_id" value="<?php echo $booking->id; ?>" class="hidden">
	    <input type="submit" id="submit" value="Reservering wijzigen">
		</form>
		<br>
		<form action="/account/delete_booking" method="post">
		<input name="booking_id" value="<?php echo $booking->id; ?>" class="hidden">
	    <input type="submit" id="submit" value="Reservering verwijderen">
		</form>
		<?php }}} ?>
	</div>
</div>

<?php include 'footer.php';?>