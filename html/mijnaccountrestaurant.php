<?php include 'header.php';?>
	
	<div class="content">
	<div class="maincontent">
		<h1>Mijn Account</h1>
		<p>Naam:<?php $user->name; ?></p>
		<p>Geslacht:<?php $user->sex; ?></p>
		<p>Geboortedatum:<?php $user->birthdate; ?></p>
		<p>Woonplaats:<?php $user->city; ?></p>
		<p><a href="gegevenswijzigen.html" title="Gegevens wijzigen">Gegevens wijzigen</a>
		<br>		
		<a href="wachtwoordveranderen.html" title="Wachtwoord veranderen">Wachtwoord veranderen</a>
		</p>		
	</div>
</div>
	
<div class="content">
	<div class="maincontent">
		<h1>Mijn Restaurant</h1>
		<p>Naam:<?php $restaurant->name; ?></p>
		<p>URL:<?php $restaurant->url; ?></p>
		<p>Aantal tafels:<?php $restaurant->tables; ?></p>
		<p>Adres:<?php $restaurant->????; ?></p>
		<p><a href="mijnrestaurantwijzigen.html" title="Gegevens wijzigen">Gegevens wijzigen</a>
		<br>		
		<a href="wachtwoordveranderen.html" title="Wachtwoord veranderen">Wachtwoord veranderen</a>
		</p>		
	</div>
</div>
	
<?php include 'footer.php';?>