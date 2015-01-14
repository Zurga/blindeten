<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/User.php';

$user = new User;
$user->permission='Admin';
$user_id=30;
var_dump($user->delete_account($user_id));

?>
