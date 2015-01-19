<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/model/User.php';

function test_mail($user) {
	$to = $user->email;
	$subject = 'BlinDeten';
	$message = 'Hoihoi';
	$headers = 'From: jim.lemmers@gmail.com';
	
	mail($to,$subject,$message,$headers);
}

$user = new User(2);
test_mail($user);
?>