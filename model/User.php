<?php

//gives var db which is a connection to the database, use $db->query() to query the database
include("dblogin.php");
global $db;

class User {
	public $name;
	public $id;
	public $permission;
	public $email;
	public $sex;
	public $birthdate;
	public $city;
	public $log_in;

}

$test = new User;
$test->get_user('rens.mester@hotmail.com');
var_dump($test);
$attr = array('name'=>'Rens Mester','sex'=>'0','birthdate'=>'1995-09-31','city'=>'Hoorn');
var_dump($attr);
var_dump($test);
echo '<br>';
echo '<br>';
$test->change_attr($attr);

var_dump($test->get_user('rens.mester@hotmail.com'));


?>
