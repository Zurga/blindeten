<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/User.php';

$user = new User(2);
echo '<br>';
$user_id=26;
$user->delete_account($user_id);
?>
