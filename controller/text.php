<?php

//check if the user ask for the info page
if($request == '/text/info.php'){
	$title = "Wat is BlinDeten?";
	include $root.'/html/info.php';
}

if($request == '/text/faq.php'){
	$title = "FAQ";
	include $root.'/html/faq.php';
}

if($request == '/text/disclaimer.php'){
	$title = "Disclaimer";
	include $root.'/html/disclaimer.php';
}

if($request == '/text/termsofuse.php'){
	$title = "Terms Of Use";
	include $root.'/html/termsofuse.php';
}

if($request == '/text/contact.php'){
	$title = "Contact";
	include $root.'/html/contact.php';
}

?>

