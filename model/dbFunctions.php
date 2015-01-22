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

function sanitize ($attr) {
	if (is_array($attr)) {
		$sanitized = array();
		foreach($attr as $key=>$val) {
			$sanitized[$key] = mysql_real_escape_string($val);
		}
	}
	else {
		$sanitized = mysql_real_escape_string($attr);
	}
	
	return $sanitized;
}

function encrypt($user, $passw) {
	$salt1 = "12M6&#%lN*msp";
	$salt2 = "@#k45hHdsl$2*";
	$salted = $salt1 . $user->email . $passw . $salt2;
	$password = hash('sha256', $salted);
	
	return $password;
}

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
?>
