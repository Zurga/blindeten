<?php
include_once "model/Model.php";
include_once "model/Auth.php";
session_start();
$model = new Model;
$auth = new Login;
$attr = array('name'=>'Jaap Testpersoon',
'email'=>'JT4@hotmail.com',
'sex'=>'0',
'birthdate'=>'1995-08-22',
'city'=>'Urk',
'password'=>'blabla');
$user = new User($model->add_account($attr));
var_dump($user);
$auth->Login($user->email, 'blabla');
var_dump($_SESSION);
$user->delete_account($user->id);
?>
