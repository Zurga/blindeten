<?php
include_once "model/Model.php";

$model = new Model;
$attr = array('name'=>'Jaap Testpersoon',
'email'=>'JT2@hotmail.com',
'sex'=>'0',
'birthdate'=>'1995-08-22',
'city'=>'Urk',
'password'=>'blabla');
$user = $model->add_account($attr);





?>
