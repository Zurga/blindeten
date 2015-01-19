<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/model/User.php';

function test_mail($user) {
	$to = $user->email;
	$subject = 'mail.php';
	$message = 'HALLO DIT IS EEN TEST';
	$headers = 'From: Jim.lemmers@gmail.com';
}

$user = new User(4);
test_mail($user);
?>