<!DOCTYPE html>
<html>
<head> 
	<title><?php echo $title; ?> | BlinDeten</title>
	<link rel="stylesheet" type="text/css" href="/html/style.css"></link>
    
    <link rel="stylesheet" type="text/css" media="all" href="/html/jsDatePick_ltr.min.css" />
    <script type="text/javascript" src="/js/jsDatePick.min.1.3.js"></script>
<!--script type="text/javascript" src="/js/functions.js"></script-->
</head>

<body>
<div id="header">
	<a href="/"><img src="html/blindetenlogo.png"></a>
</div>

<?php 
$login = true;
if ($login == false){ 
echo '
<div id="menu">
    <ul>
        <li><a href="/text/info.php" title="Wat is BlinDeten?">Wat is BlinDeten?</a></li>  
        <li><a href="/account/register.php" title="Registreer">Registreer</a></li>  
	<li><a href="/account/login.php" title="Log in">Log in</a></li> 
</ul>
<br>
</div> ';
}

if ($login == true){
echo '
<div id="menu">
    <ul>
        <li><a href="/text/info.php" title="Wat is BlinDeten?">Wat is BlinDeten?</a></li>  
        <li><a href="/account/show.php" title="Mijn Account">Mijn Account</a></li>
		<li><a href="/account/mijnreserveringen.php" title="Mijn Account">Mijn Reserveringen</a></li>
		<li><a href="/account/logout" title="Uitloggen">Uitloggen</a></li>
	</ul>
<br>
</div> ';

} ?>
