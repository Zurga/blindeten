<?php
if($logged_in == false){
	header("Location: ". $index . "/account/login.php");
}

else{

if($request == '/admin/admin.php' or $request == '/admin/'){
	$title = "Admin";
	include $root. '/admin/admin.php';
	}

if($request == '/admin/change_permission'){
	$permission = $_POST["permission"];
	$email = $_POST['email'];
	$user->change_perm($permission, $email);
	header("Location: ". $index . '/admin/');

}

if($request == '/admin/delete_account'){
	$email = $_POST['email'];
	$user->delete_account($email);
	header("Location: ". $index . '/admin/');
}

if($request == '/admin/delete_restaurant'){
	$rest_id = $_POST['rest_id'];
	$user->delete_restaurant($rest_id);
	header("Location: ". $index . '/admin/');
}

if($request == '/admin/add_restaurant'){
	$user_id = "3";
	$attr = $_POST['input'];
	$user->add_restaurant($user_id, $attr);
	header("Location: ". $index . '/admin/');
}

}



?>