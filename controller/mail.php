<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/model/User.php';
//include_once "dblogin.php";
include_once $root . "/model/dbFunctions.php";

ini_set('display_errors',1);

function test_mail($user,$mail_id) {
	global $db;
	$query = "SELECT * FROM mail WHERE id=". $mail_id;
	
	$mail_info = get_rows($db->query($query));
	$to = "rens.mester@gmail.com";//$user->email
	$subject = $mail_info['subject'];
	$message = "Welkom %user% bij BlinDeten, \r\nWaar wacht je nog op? Maak je eerste reservering! \r\n\r\nMet vriendelijke groeten, \r\n\r\nhet BlinDeten team!";//$mail_info['message'];
	$headers = 'From: Jim.lemmers@gmail.com';
	
	mail($to,$subject,$message,$headers);
}

$user = new User(2);
test_mail($user, 1);
?>