<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';

$course_id = sanitize($_POST['course_id']);
$quiz_type = sanitize($_POST['quiz_type']);
mysql_query("UPDATE course SET quiz_type='$quiz_type' WHERE id=$course_id");
?>