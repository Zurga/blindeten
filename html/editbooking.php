<?php include 'header.php';?>
<script>
window.onload=get_output('<?php echo $booking->restaurant_id;?>', 'calendar');

</script>
<div class="content">
	<div class="maincontent">
		<h1>Booking wijzigen</h1>
		<br>
		<br>
		<form action="save_editbooking" method="post">	
		<fieldset id="inputs">
			<li><p>Datum: </p>
			<p><input id="<?php echo $booking->restaurant_id?>" name="date" type="date"> </p></li>
		</fieldset>	
		</form>
    </div>
</div>
<?php include 'footer.php';?>
