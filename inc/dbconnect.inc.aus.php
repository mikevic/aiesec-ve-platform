<?php 

########## MySql details #############
$db_username = "root"; //Database Username
$db_password = "ausSERVER3774!"; //Database Password
$hostname = "localhost"; //Mysql Hostname
$db_name = 've'; //Database Name
###################################################################

$connecDB = mysql_connect($hostname, $db_username, $db_password)or die("Unable to connect to MySQL");
mysql_select_db($db_name,$connecDB);

?>