<?php 

########## MySql details #############
$db_username = "me_ve"; //Database Username
$db_password = "Federation123"; //Database Password
$hostname = "localhost"; //Mysql Hostname
$db_name = 'me_ve'; //Database Name
###################################################################

$connecDB = mysql_connect($hostname, $db_username, $db_password)or die("Unable to connect to MySQL");
mysql_select_db($db_name,$connecDB);

?>