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
function sanitize ($attr) {
	if(!is_null($attr)) {
		if (is_array($attr)) {
			$sanitized = array();
			foreach($attr as $key=>$val) {
				var_dump($sanitized);
				$sanitized[$key] = mysqli_real_escape_string($db,$val);
				var_dump($sanitized);
				$sanitized[$key] = htmlspecialchars($val);
				var_dump($sanitized);
				$sanitized[$key] = strip_tags($val);
				var_dump($sanitized);
			}
		}
		else {
			var_dump($sanitized);
			$sanitized = mysqli_real_escape_string($db,$attr);
			var_dump($sanitized);
			$sanitized = htmlspecialchars($sanitized);
			var_dump($sanitized);
			$sanitized = strip_tags($sanitized);
			var_dump($sanitized);
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
