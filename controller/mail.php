<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/model/User.php';
//include_once "dblogin.php";
include_once $root . "/model/dbFunctions.php";

ini_set('display_errors',1);

//http://bit.ly/1zD8sG9
function new_string($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $char_len = strlen($characters);
    $random_string = '';
    for ($i = 0; $i < $length; $i++) {
        $random_string .= $characters[rand(0, $char_len - 1)];
    }
    return $random_string;
}

function send_mail($user,$mail_id) {
	global $db;
	$query = "SELECT * FROM mail WHERE id=". $mail_id;
		
	$mail_info = get_rows($db->query($query));
	$to = 'rens.mester@gmail.com';//$user->email;
	$subject = $mail_info['subject'];
	$message = $mail_info['message'];
	$headers = 'From: Jim.lemmers@gmail.com';
	$message = str_replace('\r\n',"\r\n",$message);	
	$message = str_replace('%user%',$user->name,$message);
	$message = str_replace('%password%',new_string(8),$message);
	mail($to,$subject,$message,$headers);
}

$user = new User(3);
send_mail($user, 5);
?>