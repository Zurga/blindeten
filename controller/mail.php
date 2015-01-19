<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/model/User.php';

ini_set('display_errors',1);

function test_mail($user) {
	$to = 'rens.mester@gmail.com'; //$user->email;
	$subject = 'mail.php';
	$message = 'HALLO DIT IS EEN TEST';
	$headers = 'From: Jim.lemmers@gmail.com';
	
	mail($to,$subject,$message,$headers);
}

$user = new User(2);
test_mail($user);
?>