<?php

include '/model/Model.php';

class Controller {
	public $model;

	public function __construct(){
		$this->model = new Model();
	}

	public function invoke(){
		$restaurants = $this->model->get_restaurants();
		include 'view/map.php';
	}
}
?>
