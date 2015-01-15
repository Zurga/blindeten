<?php include 'header.php';?>
	
	<div class="content">
	<div class="maincontent">
		<h1>Mijn Account</h1>
		<p>Naam:<?php echo $user->name; ?></p>
		<p>Geslacht:<?php echo $user->sex; ?></p>
		<p>Geboortedatum:<?php echo $user->birthdate; ?></p>
		<p>Woonplaats:<?php echo $user->city; ?></p>
		<p><a href="/account/edit.php" title="Gegevens wijzigen">Gegevens wijzigen</a>
		<br>		
		<a href="wachtwoordveranderen.php" title="Wachtwoord veranderen">Wachtwoord veranderen</a>
		</p>		
	</div>
</div>

<?php if (isset($restaurant)){
echo '
<div class="content">
	<div class="maincontent">
		<h1>Mijn Restaurant</h1>
		<p>Naam:'. $restaurant->name .'</p>
		<p>URL:'.$restaurant->url .'</p>
		<p>Aantal tafels:'. $restaurant->tables .'</p>
		<p>Adres:'.$restaurant->street, $restaurant->number, $restaurant->zipcode, restaurant->city .'</p>
		<p><a href="/account/edit.php" title="Gegevens wijzigen">Gegevens wijzigen</a>
		<br>		
		<a href="wachtwoordveranderen.php" title="Wachtwoord veranderen">Wachtwoord veranderen</a>
		</p>		
	</div>
</div>';
} ?>
	
<<?php include 'footer.php';?>