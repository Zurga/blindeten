<?php

//check if the user ask for the info page
if($request == '/text/info.php'){
	include $root.'/html/watisblindeten.php';
}

if($request == '/text/faq.php'){
	include $root.'/html/faq.php';
}

if($request == '/text/disclaimer.php'){
	include $root.'/html/disclaimer.php';
}

if($request == '/text/contact.php'){
	include $root.'/html/contact.php';
}

?>

