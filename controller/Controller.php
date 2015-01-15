<?php

include_once 'model/Model.php';

class Controller {
	public $model;

	public function __construct(){
		$this->model = new Model;
	}

	public function invoke(){
		$urlRoutes = array(
			'/^\$/' => 'index',
			'/^\account\/$/'=> 'account');
		$root = $_SERVER['DOCUMENT_ROOT'];
		$request = $_SERVER['REQUEST_URI'];
		var_dump($request);
		foreach($urlRoutes as $route=>$controller_name){
			if(preg_match($route, $request)){
				$controller = $controller_name;
			}
		}

		if (!empty($controller)){
			require $root . '/controllers' . $controller. '.php';
		}
		else{
			echo 'page not found';
		}	


	}
}
?>
