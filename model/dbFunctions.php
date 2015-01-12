<?php
//return all rows or one
function get_rows($result){
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
	else{
		return false;
	}
}

function set_var($var, $object){
	foreach($var as $key=>$val){
		echo $object;
		$object->$key = $val;
	}
}
?>
