<?php include 'header.php';?>
<script>
get_output('<?php echo $booking->restaurant_id;?>', 'calendar','input[id]=<?php echo $booking->restaurant_id;?>');

</script>
<div class="content">
	<div class="maincontent">
		<h1>Booking wijzigen</h1>
		<br>
		<br>
		<form action="save_editbooking" method="post">	
		<fieldset id="inputs">
			<p><input id="<?php echo $booking->restaurant_id?>-input" name="date" type="date"> </p>
		<ul id="bookings-<?php echo $booking->restaurant_id;?>">
		</ul>
		</fieldset>	
		</form>
    </div>
</div>
<?php include 'footer.php';?>
