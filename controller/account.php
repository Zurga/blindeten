<?php
var_dump($_SERVER);
var_dump($_POST);
if($request == '/account/'){
	$user = new User(4);
	$title = 'Account';
	
	if($user->owner != 0){
		$restaurant = new Restaurant($user->owner);
	}

	include $root . '/html/show.php';
}
if($request == '/account/login.php'){
	include $root . '/html/login.php';
}
?>
