<?php

//if($request == '/account/'){
	$user = new User(4);
//	$title = 'Account';
	
	if($user->owner != 0){
		$restaurant = new Restaurant($user->owner);
	}

	include $root . '/html/show.php';
//}
?>
