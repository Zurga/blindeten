<?php include 'header.php';?>
	
	<div class="content">
	<div class="maincontent">
		<h1>Mijn Account</h1>
		<br><br>
		<p><b>Naam: </b> <?php echo $user->name ,' ', $user->surname; ?></p>
		<p><b>Geslacht: </b> <?php if ($user->sex == 0) {echo 'Man';} else {echo 'Vrouw';} ?></p>
		<p><b>Geboortedatum: </b> <?php echo $user->birthdate; ?></p>
		<p><b>Woonplaats: </b> <?php echo $user->city; ?></p>
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
		<p><b>Naam: </b> '. $restaurant->name .'</p>
		<p><b>URL: </b><a href="'.$restaurant->url .'">'.$restaurant->url.'</a></p>
		<p><b>Aantal tafels: </b>'. $number = $restaurant->tables;
		echo count($number).'</p>
		<p><b>Adres: </b>'. $restaurant->street.' '.$restaurant->number.'<br>'. $restaurant->zipcode.' '. $restaurant->city.'<br><br></p>	
		<p><a href="/account/edit_restaurant.php" title="Gegevens wijzigen">Gegevens wijzigen</a>
		</p><br>
		<p>* Als u een tafel of uw restaurant wilt verwijderen, neem dan <a href="/html/contact.php">contact</a> met ons op</p>		
	</div>
</div>';
} ?>
	
<?php include 'footer.php';?>
