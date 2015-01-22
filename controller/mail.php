<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/model/User.php';
//include_once "dblogin.php";
include_once $root . "/model/dbFunctions.php";

ini_set('display_errors',1);

function send_mail($user,$mail_id) {
	global $db;
	$query = "SELECT * FROM mail WHERE id=". $mail_id;
		
	$mail_info = get_rows($db->query($query));
	$to = $user->email;
	$subject = $mail_info['subject'];
	$message = $mail_info['message'];
	$headers = 'From: Jim.lemmers@gmail.com';
	$message = str_replace('\r\n',"\r\n",$message);	
	$message = str_replace('%user%',$user->name,$message);
	$message = str_replace('%password%',new_string(8),$message);
	mail($to,$subject,$message,$headers);
}

$user = new User(2);
send_mail($user, $mail_id);
?>