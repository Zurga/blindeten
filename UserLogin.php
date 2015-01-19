<?php
include_once "model/Model.php";
include_once "model/Auth.php";
session_start();
$model = new Model;
$auth = new Login;
$attr = array('name'=>'Jaap Testpersoon',

'email'=>'JT5@hotmail.com',
'email'=>'JT6@hotmail.com',
'sex'=>'0',
'birthdate'=>'1995-08-22',
'city'=>'Urk',
'password'=>'blabla');
$id = $model->add_account($attr);
echo '<br/>';
echo 'id:'. $id;
$user = new User($id);
echo '<br/>';
echo '<br/>';
var_dump($user);
$auth->Login($user->email, 'blabla');
echo '<br/>';
echo '<br/>';
var_dump($_SESSION);
echo '<br/>';
echo '<br/>';
echo '<br/>';
$user->delete_account($id);
?>
