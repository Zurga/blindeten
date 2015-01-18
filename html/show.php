<?php include 'header.php';?>
	
	<div class="content">
	<div class="maincontent">
		<h1>Mijn Account</h1>
		<br>
		<p>Naam: <?php echo $user->name; ?></p>
		<p>Geslacht: <?php if ($user->sex == 0) {echo 'Man';} else {echo 'Vrouw';} ?></p>
		<p>Geboortedatum: <?php echo $user->birthdate; ?></p>
		<p>Woonplaats: <?php echo $user->city; ?></p>
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
		<p>Naam:' . <?php echo $restaurant->name; ?> .'</p>
		<p>URL:'.<?php echo $restaurant->url; ?> .'</p>
		<p>Aantal tafels:'.<?php echo $restaurant->tables; ?>.'</p>
		<p>Adres:'.<?php echo $restaurant->street; echo $restaurant->number; echo $restaurant->zipcode; echo $restaurant->city; ?>.'</p>
		<br>
		<p>Naam: '. $restaurant->name .'</p>
		<p>URL: <a href="'.$restaurant->url .'">'.$restaurant->url.'</a></p>
		<p>Aantal tafels: '. $restaurant->tables .'</p>
		<p>Adres: '. $restaurant->street.' '.$restaurant->number.'<br>'. $restaurant->zipcode.' '. $restaurant->city.'</p>	
		<p><a href="/account/edit.php" title="Gegevens wijzigen">Gegevens wijzigen</a>
		<br>		
		<a href="wachtwoordveranderen.php" title="Wachtwoord veranderen">Wachtwoord veranderen</a>
		</p>		
	</div>
</div>';
} ?>
	
<?php include 'footer.php';?>
