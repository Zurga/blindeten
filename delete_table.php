<?php
include_once "model/Model.php";
include_once "model/User.php";
include_once "model/Restaurant.php";

$user = new User;
$user->permission='Admin';
$restaurant = new Restaurant;
$restaurant->id=2;
$table_id=20;
$attr = array('rest_id'=>'2');
$user->delete_table($restaurant,$table_id);

?>
