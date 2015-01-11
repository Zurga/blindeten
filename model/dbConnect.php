<?php
//This file automatically created by installer.php on Feb 08, 2010 09:40 pm
$HOST = 'localhost'; // Server address, normally localhost when on Linux.
$DB_USER = ''; // Database username
$DB_PASS = ''; // Database password
$DB_NAME = ''; // Database name
$DB_USEDATACACHE = 0; // 0 = no, 1 = yes.
$DB_DATACACHEPATH = ''; // Path to the data cache if used.

mysql_connect($HOST, $DB_USER, $DB_PASS, $DB_NAME);
mysql_select_db('blindeten');
?>
