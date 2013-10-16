<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';

$mod_id = sanitize($_POST['mod_id']);
mysql_query("DELETE from modules WHERE id = $mod_id");

?>