<?php

if($request == '/admin/admin.php'){
	$title = "Admin";
	include $root . "/html/admin.php";
}

if($request == '/admin/change_permission'){
	$permission = $_POST["permission"];
	$email = $_POST['email'];
	$user->change_perm($permission, $email);
	header("Location: ". $index . '/admin/');

}

if($request == 'admin/delete_account'){
	$email = $_POST['email'];
	$user->delete_account($email);
	header("Location: ". $index . '/admin/');
}

if($request == 'admin/delete_restaurant'){
	$user->delete_restaurant();
	header("Location: ". $index . '/admin/');
}

if($request == 'admin/add_restaurant'){
	$user->add_restaurant();
	header("Location: ". $index . '/admin/');
}


?>