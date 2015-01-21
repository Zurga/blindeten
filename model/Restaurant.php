<?php

include_once 'dblogin.php';
include_once 'dbFunctions.php';

class Restaurant{
	public $id;
	public $name;
	public $lat;
	public $lon;
	public $street;
	public $number;
	public $zipcode;
	public $city;
	public $url;
	public $tables;
	private $db;
	

	function __construct($id){
		global $db;
		$this->db = $db;

		$query = "SELECT name, lat, lon," .
			" street, number, zipcode, city, url" .
			" FROM restaurant WHERE id = " . $id;

		if($row = get_rows($this->db->query($query))){
			foreach($row as $key => $val){
				$this->$key = $val; 
			}
			$this->id = $id;
		}
	}

	function get_bookings(){
		$query = "SELECT id FROM bookings WHERE time =";
	}
}
?>
