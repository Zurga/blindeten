<?php

include_once 'model/Model.php';
include_once 'model/Auth.php';

class Controller {
	public $model;

	public function __construct(){
		$this->model = new Model;
	}

	public function invoke(){
		$auth = new Auth;
		$logged_in = $auth->check_login();
		$urlRoutes = array(
			'/\/$/' => 'index',
			'/\/account\//'=> 'account',
			'/\/admin\//' => 'admin',
			'/\/about\//' => 'about',
			'/\/ajax\//' => 'ajax'
			);

		$root = $_SERVER['DOCUMENT_ROOT'];
		$request = $_SERVER['REQUEST_URI'];
//		var_dump($request);
		foreach($urlRoutes as $route=>$controller_name){
			if(preg_match($route, $request)){
				$controller = $controller_name;
			}
		}

		if (!empty($controller)){
			require $root . '/controller/' . $controller. '.php';
		}
		else{
			echo 'page not found';
		}	
	}
}
?>
