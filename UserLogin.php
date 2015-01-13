<?php
include_once "model/Model.php";

$model = new Model;
$attr = array('name'=>'Rens Mosterd',
'email'=>'rens.mosterd@hotmail.com',
'sex'=>'0',
'birthdate'=>'1995-09-31',
'city'=>'Hoorn',
'password'=>'blabla');
$user = $model->add_account($attr);





?>
