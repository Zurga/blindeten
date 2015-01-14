<?php

include_once 'model/Model.php';

class Controller {
	public $model;

	public function __construct(){
		$this->model = new Model;
	}

	public function invoke(){

		$root = $_SERVER['DOCUMENT_ROOT'];
		$restaurants = $this->model->get_restaurants();

	var_dump($_SERVER); 
		include $root . '/html/map.php';
		if ($_SERVER['REQUEST_URI'] = '/watisblindeten.html'){
		       include $root . 'html/watisblindeten.php';
	}
	}
}
?>
