<?php

if($request == '/account/'){
	$user = new User(2);
	include $root . '/html/show.php';
}
?>
