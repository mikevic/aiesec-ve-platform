<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';

$module_name = sanitize($_POST['module-name']);
$module_desc = sanitize($_POST['module-desc']);
$platform = sanitize($_POST['platform']);
$element = sanitize($_POST['element-id']);
$user_id = sanitize($_POST['user_id']);
$course_id = sanitize($_POST['course_id']);
$result = mysql_query("SELECT * from modules WHERE course_id=$course_id");
$order = mysql_num_rows($result) + 1;
mysql_query("INSERT INTO modules (course_id, platform, element_id, module_name, mod_order, module_desc, created_by) VALUES ($course_id,'$platform','$element','$module_name', $order, '$module_desc', '$user_id')");
echo '<h4>Module Created!</h4>';
?>