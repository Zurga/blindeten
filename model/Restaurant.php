<?php

class Restaurant{
	public $id;
	public $name;
	public $lat;
	public $lon;
	public $street;
	public $number;
	public $city;
	public $url;
	public $tables;

	function __construct($id){
		$query = "SELECT restaurant.name, restaurant.lat, restaurant.lon," .
			" restaurant.street, restaurant.city, restaurant.url";
	}
}
