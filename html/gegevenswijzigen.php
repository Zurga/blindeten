<!DOCTYPE html>
<html>
<head> 
	<title>BlinDeten</title>
	<link rel="stylesheet" type="text/css" href="style.css"></link>
</head>

<body>
<div id="header">
	<a href="header.html"> <img src="html/blindetenlogo.png"></a>
</div>


<div id="menu">
    <ul>
        <li><a href="watisblindeten.html" title="Wat is BlinDeten?">Wat is BlinDeten?</a></li>  
        <li><a href="registreer.html" title="Registreer">Registreer</a></li>  
		<li><a href="login.html" title="Log in">Log in</a></li> 
<br>
</div>

<div class="content">
	<div class="maincontent">
		<h1>Gegevens veranderen</h1>
		<br>
		<form>	
		<fieldset id="inputs">
			<li><p>Naam:</p><br><br>
			<input id="name" name="input['name']" type="text" placeholder="Naam" required></p></li>
			<br>
			<li><p><input type="radio" name="input['sex']" value="male" >Man</p></li>
		    <li><p><input type="radio" name="input['sex']" value="female" >Vrouw</p></li> 
			<br>
			<li><p>Geboortedatum:</p><br><br>
			<input id="birthdate" name="input['birthdate']" type="date" placeholder="Geboortedatum" required></p></li>
			<br>
			<li><p>Woonplaats:</p><br><br>
			<input id="city" name="input['city']" type="text" placeholder="Woonplaats" required></p></li>
			<br>
			<br>
			<br>
			<li><input type="submit" id="submit" value="Gegevens opslaan"></p></li>
		</fieldset>	
		</form>
			 
	</div>
</div>

<div id="footer">
	<ul>
        <li><a href="faq.html" title="FAQ">FAQ</a></li>  
        <li><a href="disclaimer.html" title="Disclaimer">Disclaimer</a></li>  
		<li><a href="termsofuse.html" title="Terms of Use">Terms Of Use</a></li>
		<li><a href="contact.html" title="Contact">Contact</a></li>
	</ul>
</div>

</body>
</html>