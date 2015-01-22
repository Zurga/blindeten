<?php

if($request == '/admin/admin.php'){
	$title = "Admin";
	include $root . "/html/admin.php";
}

if($request == '/admin/change_permission'){
	$user->change_perm();
}

if($request == 'admin/delete_account'){
	$user->delete_account();
}

if($request == 'admin/delete_restaurant'){
	$user->delete_restaurant();
}

if($request == 'admin/add_restaurant'){
	$user->add_restaurant();
}


?>