<?php
//var_dump($_POST);
//echo '<br>';

if($request == '/account/show.php'){ 
	if($logged_in){
		$title = 'Account';
		var_dump($_SESSION['id']);
		$user = new User($_SESSION['id']);
		var_dump($user);
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

if($request == '/account/login.php' & $logged_in == false){
	include $root . '/html/login.php';
}

if($request == '/account/set_login'){
	$login = new Login;
	if($logged_in =  $login->login($_POST['email'], $_POST['password'])){
		header("Location: http://ik35.webdb.fnwi.uva.nl");
	}
	else{
		echo 'niet gelukt';
		include $root . '/html/login.php';
	}
}
?>
