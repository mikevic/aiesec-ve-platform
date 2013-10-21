<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';

$function_name = sanitize($_POST['function_name']);
mysql_query("INSERT into functions (func_name) VALUES ('$function_name')");
require 'load-current-functions.php';
?>