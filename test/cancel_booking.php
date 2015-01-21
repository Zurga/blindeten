<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/User.php';
include $root . '/model/Booking.php';

$user = new User(4);
$booking = new Booking(4);
var_dump($user->cancel_booking(29));
?>