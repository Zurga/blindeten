<?php

include('dblogin.php');

class Map{
	//markers is an array with restaurant associative arrays.
	var $markers = array();
	
	public function get_geo_info(){
		global $db;

		$query = 'SELECT DISTINCT id,restaurant.name, restaurant.lat, restaurant.lon,'.
			' restaurant.url ' .
			' FROM restaurant' .
			' JOIN tables on restaurant.id = tables.rest_id' .
			' WHERE tables.user2 is NULL';
		echo $query;
		
		$result = $db->query($query);
		
		if ($result->num_rows > 0) {
			//add the rows to the marker array
			while ($row = $result->fetch_assoc()) {
				var_dump($row);
				$row['table_ids'] = array();
				//get the tables
				$subq = 'SELECT id FROM `tables`' .
					' WHERE rest_id = ' . $row['id'];

				$result = $db->query($subq);

				if ($result->num_rows > 0) {
					while ($table = $result->fetch_assoc()) {
						//add the table id to the restaurant
						array_push($row['table'], $table);
					}
				}			
				$this->markers[] = $row;
			}
		}

	}
}
				
$map = new Map;
$map->get_geo_info();
var_dump($map);
