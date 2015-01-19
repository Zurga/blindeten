<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/model/User.php';

function test_mail($user) {
	$to = $user->email;
	$subject = 'BlinDeten';
	$message = 'Hoihoi Laura';
	$headers = 'From: info@blindeten.nl';
	
	mail($to,$subject,$message,$headers);
}

$user = new User(5);
test_mail($user);
?>