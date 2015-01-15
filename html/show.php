<?php include 'header.php';?>
	
	<div class="content">
	<div class="maincontent">
		<h1>Mijn Account</h1>
		<p>Naam:<?php $user->name; ?></p>
		<p>Geslacht:<?php $user->sex; ?></p>
		<p>Geboortedatum:<?php $user->birthdate; ?></p>
		<p>Woonplaats:<?php $user->city; ?></p>
		<p><a href="/account/edit.php" title="Gegevens wijzigen">Gegevens wijzigen</a>
		<br>		
		<a href="wachtwoordveranderen.php" title="Wachtwoord veranderen">Wachtwoord veranderen</a>
		</p>		
	</div>
</div>



<div class="content">
	<div class="maincontent">
		<h1>Mijn Restaurant</h1>
		<p>Naam:<?php $restaurant->name; ?></p>
		<p>URL:<?php $restaurant->url; ?></p>
		<p>Aantal tafels:<?php $restaurant->tables; ?></p>
		<p>Adres:<?php $restaurant->street,$restaurant->number, $restaurant->zipcode, $restaurant->city; ?></p>
		<p><a href="/account/edit.php" title="Gegevens wijzigen">Gegevens wijzigen</a>
		<br>		
		<a href="wachtwoordveranderen.php" title="Wachtwoord veranderen">Wachtwoord veranderen</a>
		</p>		
	</div>
</div>
	
<<?php include 'footer.php';?>