<?php
include_once "model/Model.php";
include_once "model/User.php";
include_once "model/Restaurant.php";

$user = new User;
$restaurant = new Restaurant;
$restaurant->id=2;
$attr = array('rest_id'=>'9');
$user->add_table($restaurant);

?>