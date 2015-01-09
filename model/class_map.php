<?php

include('dblogin.php');

class Map{
	//markers is an array with restaurant associative arrays.
	var $markers = array();
	
	public function get_geo_info(){
		global $db;

		$query = 'SELECT DISTINCT restaurant.id,restaurant.name,' .
			' restaurant.lat, restaurant.lon, restaurant.url' .
			' FROM restaurant' .
			' JOIN tables on restaurant.id = tables.rest_id' .
			' WHERE tables.user2 is NULL';
		
		$result = $db->query($query);
		
		if ($result->num_rows > 0) {
			//add the rows to the marker array
			while ($row = $result->fetch_assoc()) {
				//get the tables
				$subq = 'SELECT id FROM `tables`' .
					' WHERE rest_id = ' . $row['id'];

				$result_table = $db->query($subq);

				if ($result_table->num_rows > 0) {
					while ($table = $result_table->fetch_assoc()) {
						//add the table id to the restaurant
						$row['table'][] = $table['id'];
					}
				}			
				$this->markers[] = $row;
			}
		}
	}
}
