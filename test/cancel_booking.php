<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/User.php';
include $root . '/model/Booking.php';

$user = new User(2);
var_dump($user->cancel_booking(28));
?>