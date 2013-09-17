<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';

$course_name = sanitize($_POST['course-name']);
$course_desc = sanitize($_POST['course-desc']);
$function = sanitize($_POST['function']);
$course_id = sanitize($_POST['course_id']);
mysql_query("UPDATE course SET name='$course_name', course_desc='$course_desc', course_func=$function WHERE id=$course_id");
echo '<h4>Course details updated!</h4>';
?>