<?php
//return all rows or one
function get_rows($result){
	if($result){
		if ($result->num_rows == 1){
				$row = $result->fetch_assoc();
				return $row;
			}
		else if($result->num_rows > 1){
			$rows = array();
			while ($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
	}		
	else{
		return false;
	}
}

function set_var($var, $object){
	foreach($var as $key=>$val){
		$object->$key = $val;
	}
	return $object;
}

//Sanitize input in our forms (no scripts can be put in)
function sanitize ($attr,$db) {
	echo '<br>';
	if(!is_null($attr)) {
		if (is_array($attr)) {
			$sanitized = array();
			foreach($attr as $key=>$val) {
				$sanitized[$key] = mysqli_real_escape_string($db,$val);
				$sanitized[$key] = mysql_real_escape_string($val);
				$sanitized[$key] = htmlspecialchars($val);
				$sanitized[$key] = strip_tags($val);
			}
		}
		else {
			$sanitized = mysqli_real_escape_string($db,$attr);
			$sanitized = mysql_real_escape_string($attr);
			$sanitized = htmlspecialchars($sanitized);
			$sanitized = strip_tags($sanitized);
		}	
		return $sanitized;
	}
	else {
		return false;
	}
}

//Encrypt a password with salt, email address of user, the password and hash()
function encrypt($email, $passw) {
	$salt1 = "12M6&#%lN*msp";
	$salt2 = "@#k45hHdsl$2*";
	$salted = $salt1 . $email . $passw . $salt2;
	$password = hash('sha256', $salted);
	
	return $password;
}

//Generate a new random password
//Source: http://bit.ly/1zD8sG9
function new_string($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $char_len = strlen($characters);
    $random_string = '';
    for ($i = 0; $i < $length; $i++) {
        $random_string .= $characters[rand(0, $char_len - 1)];
    }
    return $random_string;
}
?>
