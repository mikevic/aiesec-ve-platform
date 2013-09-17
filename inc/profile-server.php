<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';

$lc = sanitize($_POST['lc']);
$id = sanitize($_POST['id']);
$function = sanitize($_POST['function']);
mysql_query("UPDATE users SET lc=$lc WHERE id=$id");
mysql_query("UPDATE users SET function=$function WHERE id=$id");
echo '<h4>Thank you for updating your profile!</h4>'

?>