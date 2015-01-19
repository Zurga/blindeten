<!DOCTYPE html>
<html>
<head> 
	<title><?php echo $title; ?> | BlinDeten</title>
	<link rel="stylesheet" type="text/css" href="/html/style.css"></link>
</head>

<body>
<div id="header">
	<a href="/"><img src="html/blindetenlogo.png"></a>
</div>

<?php if (($login == false)){ 
echo '
<div id="menu">
    <ul>
        <li><a href="/text/info.php" title="Wat is BlinDeten?">Wat is BlinDeten?</a></li>  
        <li><a href="/account/registreer.php" title="Registreer">Registreer</a></li>  
	<li><a href="/account/login.php" title="Log in">Log in</a></li> 
</ul>
<br>
</div> ';
}

else {
echo '
<div id="menu">
    <ul>
        <li><a href="/text/info.php" title="Wat is BlinDeten?">Wat is BlinDeten?</a></li>  
        <li><a href="/account/show.php" title="Mijn account">Mijn account</a></li>  
	</ul>
<br>
</div> ';

} ?>