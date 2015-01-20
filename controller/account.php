<?php
//var_dump($_POST);
//echo '<br>';
include_once $root . '/model/Auth.php';
$auth = new Login;
$logged_in = $auth->check_login();

if($request == '/account/show.php'){
	if($_SESSION['logged_in']){
		$title = 'Account';
		$user = new User($_SESSION['id']);
		//$age
		if($user->owner != 0){
			$restaurant = new Restaurant($user->owner);
		}
		include $root . '/html/show.php';
	}
}

if($request == '/account/register.php') {
	include $root . '/html/register.php';
}

if ($request == '/account/logout') {
	$login = new Login;
	$login->logout();
	header("Location: http://ik35.webdb.fnwi.uva.nl");
}	

if($request == '/account/login.php' & $logged_in == false & empty($_POST)){
	include $root . '/html/login.php';
}
else{
	$login = new Login;
	if($logged_in =  $login->login($_POST['email'], $_POST['password'])){
		header("Location: http://ik35.webdb.fnwi.uva.nl");
	}
	else{
		include $root . '/html/login.php';
	}
}
?>
