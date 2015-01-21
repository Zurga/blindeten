<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/User.php';
include $root . '/model/Restaurant.php';

$user = new User(2);
$rest = new Restaurant(6);
var_dump(get_bookings($user));

?>