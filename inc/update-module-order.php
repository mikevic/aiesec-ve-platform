<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';

$id = sanitize($_POST['id']);
$order = sanitize($_POST['order']);
mysql_query("UPDATE modules SET mod_order=$order WHERE id=$id")
?>