<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';

$course_id = sanitize($_POST['course_id']);
$value = sanitize($_POST['value']);
$user_id = sanitize($_POST['user_id']);

if($value == 'yes'){
	mysql_query("INSERT into subscriptions (user_id, course_id) VALUES ($user_id, $course_id ) ");
} else {
	mysql_query("DELETE from subscriptions WHERE user_id = $user_id AND course_id = $course_id");
}

?>