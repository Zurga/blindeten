<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/User.php';

$user = new User(15);
var_dump($user);
$user_id=15;
var_dump($user->delete_account($user_id));

?>
