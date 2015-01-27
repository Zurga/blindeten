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
		//check which table belong to the restaurant
		$tableQ = 'SELECT id FROM `tables`' .
			' WHERE rest_id = ' . $row['id'];

		if($tables = get_rows($this->db->query($tableQ))){
			foreach($tables as $table){
			//add the table id to the restaurant
				if(gettype($table) == 'string'){
					$restaurant->tables[] = $table;
				}
				else{
					$restaurant->tables[] = $table['id'];
				}
			}
		}
	}
}
?>
