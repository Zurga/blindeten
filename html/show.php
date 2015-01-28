<?php include 'header.php';?>
	
	<div class="content">
	<div class="maincontent">
		<h1>Mijn Account</h1>
		<br><br>
		<p>Naam: <?php echo $user->name,' ',echo $user->surname ?></p>
		<p>Geslacht: <?php if ($user->sex == 0) {echo 'Man';} else {echo 'Vrouw';} ?></p>
		<p>Geboortedatum: <?php echo $user->birthdate; ?></p>
		<p>Woonplaats: <?php echo $user->city; ?></p>
		<br>
		<br>
		<p><a href="/account/edit.php" title="Gegevens wijzigen">Gegevens wijzigen</a>
		<br>		
		<br>
		<a href="/account/change_password.php" title="Wachtwoord veranderen">Wachtwoord veranderen</a>
		</p>		
	</div>
</div>

<?php if (isset($restaurant)){
echo '
<div class="content">
	<div class="maincontent">
		<h1>Mijn Restaurant</h1><br><br>
		<p>Naam: '. $restaurant->name .'</p>
		<p>URL: <a href="'.$restaurant->url .'">'.$restaurant->url.'</a></p>
		<p>Aantal tafels: '. $restaurant->tables .'</p>
		<p>Adres: '. $restaurant->street.' '.$restaurant->number.'<br>'. $restaurant->zipcode.' '. $restaurant->city.'<br><br></p>	
		<p><a href="/account/edit_restaurant.php" title="Gegevens wijzigen">Gegevens wijzigen</a>
		</p>		
	</div>
</div>';
} ?>
	
<?php include 'footer.php';?>
