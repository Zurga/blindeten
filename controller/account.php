<?php

if($request == '/account/show.php'){
	$user = new User(2);
	include $root . '/html/show.php';
}
?>
