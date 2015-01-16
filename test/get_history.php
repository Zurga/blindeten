<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/User.php';
include $root . '/model/Model.php';
$model = new Model;
$user = new User(2);
$user_id = 2;
var_dump($model->get_history($user));
?>
