<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';

$course_name = sanitize($_POST['course-name']);
$course_desc = sanitize($_POST['course-desc']);
$function = sanitize($_POST['function']);
$id = sanitize($_POST['id']);
mysql_query("INSERT INTO course (name, created_by, course_desc, course_func) VALUES ('$course_name','$id','$course_desc','$function')");
echo '<h4>Course Created!</h4>'

?>