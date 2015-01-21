<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/User.php';
include $root . '/model/Restaurant.php';
include $root . '/model/Model.php';


$user = new User(2);
$rest = new Restaurant(6);
$model = new Model;

var_dump($model->get_bookings($user));

?>