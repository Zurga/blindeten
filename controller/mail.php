<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/model/User.php';
//include_once "dblogin.php";
include_once $root . "/model/dbFunctions.php";

function send_mail($user,$mail_id, $data=NULL) {
	global $db;	
	$query = "SELECT * FROM mail WHERE id=". $mail_id;
		
	$mail_info = get_rows($db->query($query));
	$to = $user->email;
	$subject = $mail_info['subject'];
	$message = $mail_info['message'];
	$headers = 'From: Viagrahetviagra@bedrijf.nl';
	
	
	
	//personalize message
	$message = str_replace('\r\n',"\r\n",$message);	
	$message = str_replace('%user%',$user->name,$message);
	$message = str_replace('%password%', $data, $message);
	
	mail($to,$subject,$message,$headers);
	var_dump($php_errormsg);
}

?>