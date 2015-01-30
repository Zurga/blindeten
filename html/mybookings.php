<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<h1>Mijn reserveringen</h1>
		<br>
		<br>
		<?php if(isset($message)) {
					echo '<p class="confirm">' . $message .'</p>';
				}
		
		if(empty($bookings)) {
			echo '<p>Er zijn nog geen reserveringen.</p>';
		}
			else {
		
		foreach($bookings as $booking) { ?>	
		<hr><br>
		<p><b>Datum: </b><?php echo $booking->date?></p>
		<p><b>Tijd: </b><?php echo substr($booking->time, 0, 5); ?></p>
		<p><b>Met: </b><?php if($booking->user1->age() == 0 or $booking->user2->age() == 0) {
		echo 'Er is nog niemand aangeschoven.';
		} 

		else {if($booking->user2->id == $user->id){ 
		  if ($booking->user1->sex == 0) {
		echo 'Man, ';
		} else {echo 'Vrouw, ';} echo $booking->user1->age(). ' jaar'; 
		}
		
		else if($booking->user1->id == $user->id){ 
		  if ($booking->user2->sex == 0) {
		echo 'Man, ';
		} else {echo 'Vrouw, ';} echo $booking->user2->age().' jaar'; 
		}} ?> </p>
		
		<p><b>Restaurant: </b> <?php $restaurant = new restaurant($booking->restaurant_id); echo $restaurant->name; ?></p>
	
		
		<form action="/account/edit_booking" method="post">
		<input name="booking_id" value="<?php echo $booking->id; ?>" class="hidden">
	    <input type="submit" id="submit" value="Reservering wijzigen" style="float:right">
		</form>
		
		<form action="/account/delete_booking" method="post">
		<input name="booking_id" value=<?php echo $booking->id; ?> class="hidden">
	    <input type="submit" id="submit" value="Reservering verwijderen" style="float:right">
	    <br>
		</form>
		

		<?php }} ?>
	</div>
</div>

<?php include 'footer.php';?>
