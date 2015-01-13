<?php
include_once "model/Model.php";
include_once "model/User.php";
include_once "model/Restaurant.php";

$user = new User;
$user->permission='Admin';
$permission=0;
$email=JT@hotmail.com
$user->change_perm($permission,$email);
?>