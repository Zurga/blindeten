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
if($request == '/account/login.php' & empty($_POST)){
	include $root . '/html/login.php';
}
else{
	include_once $root . '/model/Auth.php';
	$login = new Login;
	var_dump($login->login($_POST['email'], $_POST['password']));
}
?>
