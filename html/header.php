<!DOCTYPE html>
<html>
<head> 
	<title><?php echo $title; ?> | BlinDeten</title>
	<link rel="stylesheet" type="text/css" href="/html/style.css"></link>
    <link rel="stylesheet" type="text/css" media="all" href="/html/datepicker.min.css" />
    <script type="text/javascript" src="/js/datepicker.min.js"></script>
	<script type="text/javascript" src="/js/lang/nl.js"></script>

</head>

<body>
<div id="header">
	<a href="/"><img src="/html/blindetenlogo.png"></a>
</div>

<div id="menu">
    <ul>
        <li><a href="/text/info.php" title="Wat is BlinDeten?">Wat is BlinDeten?</a></li>  
        <?php
		if ($logged_in){
			echo '<li><a href="/account/show.php" title="Mijn Account">Mijn Account</a></li>';
			if ($user->permission == "Admin"){
				echo '<li><a href="/admin/admin.php" title="Admin pagina">Admin</a></li>';
			}
			echo '<li><a href="/account/mijnreserveringen.php" title="Mijn Account">Mijn Reserveringen</a></li>
			<li><a href="/account/logout" title="Uitloggen">Uitloggen &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>'
			if(isset($welcome)) {
				echo '<li><a <p>' . $welcome .'</p></a></li>';
			}
		}else{
			echo ' <li><a href="/account/register.php" title="Registreer">Registreer</a></li>  
					<li><a href="/account/login.php" title="Log in">Log in</a></li>';
		}?>
	</ul>
<br>
</div>