<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once '/model/User.php';
include_once '/model/Restaurant.php';

$user = new User(2);
$rest = new Restaurant(6);
var_dump(get_bookings($user));

?>