<?php 
$root = $_SERVER['DOCUMENT_ROOT'] . '/';

include_once $root ."model/Model.php";
include_once $root ."model/User.php";
include_once $root ."model/Restaurant.php";
include_once $root ."model/dblogin.php";
global $db;

$query = "SELECT * from user_perm WHERE 1";
var_dump($result);
echo '<br/>';
function get_row($result){
if ($result->num_rows == 1){
		$row = $result->fetch_assoc();
		var_dump($row);
	}
else if($result->num_rows > 1){
	$rows = array();
	while ($row = $result->fetch_assoc()){
		$rows[] = $row;
	}
	var_dump($rows);
}

else{
	return false;
}
}

get_row($db->query($query));
/*
$user = new User(2);
vddar_dump($user);
echo '<br/>';
$restaurant = new Restaurant(2);
var_dump($restaurant);
$model = new Model;
$restaurant->tables=array(4,5);
//$table_id=4;
//var_dump($model->book_table($user,$restaurant,$table_id, '2015-02-04 18:00:00'));
 */
?>
