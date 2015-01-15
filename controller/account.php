<?php
var_dump($_POST);
echo '<br>';
var_dump($_SESSION);
if($request == '/account/'){
	$user = new User(4);
	$title = 'Account';
	
	if($user->owner != 0){
		$restaurant = new Restaurant($user->owner);
	}

	include $root . '/html/show.php';
}
if($request == '/account/login.php' & !isset($_POST)){
	include $root . '/html/login.php';
}
else{
	include_once $root . '/model/Auth.php';
	$login = new Login;
	$login->login($_POST['email'], $_POST['password']);
}
?>
