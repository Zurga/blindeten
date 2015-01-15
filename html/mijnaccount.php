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
<?php include 'footer.php';?>