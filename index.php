<?php
include_once('controller/Controller.php');
echo $_SERVER['DOCUMENT_ROOT'];
$controller = new Controller();
$controller->invoke();
?>
