<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/User.php';

$user = new User(2);
$restaurant = new Restaurant;
$restaurant->id=2;
$attr = array('rest_id'=>'2');
$user->add_table($restaurant);

for ($i = 1; $i <= 10; $i++) {
	$user->add_table($restaurant);
}
?>