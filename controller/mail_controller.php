<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/model/User.php';
include_once $root . "/model/dbFunctions.php";

function send_mail($user,$mail_id, $data=NULL) {
	global $db;	
	$query = "SELECT * FROM mail WHERE id=". $mail_id;
		
	$mail_info = get_rows($db->query($query));
	$to = $user->email;
	$subject = $mail_info['subject'];
	$message = $mail_info['message'];
	$headers = 'From: BlinDeten@info.nl';
	
	
	
	//personalize message
	$message = str_replace('\r\n',"\r\n",$message);	
	$message = str_replace('%user%',$user->name,$message);
	//time and password will never be in the same mail
	$message = str_replace(array('%time%','%password%'), $data, $message);
	
	mail($to,$subject,$message,$headers);
}

?>
