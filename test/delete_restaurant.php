<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/User.php';

$user = new User(2);
$rest_id = 1;
$user->delete_restaurant($rest_id);
?>