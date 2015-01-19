<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/User.php';
include $root . '/model/Model.php';

$model = new Model;
$user = new User(2);
$booking_id = 1;
var_dump(add_history($user,$booking_id);

?>