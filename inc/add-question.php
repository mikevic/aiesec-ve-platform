<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';

$type = sanitize($_POST['type']);
$question = sanitize($_POST['question']);
$course_id = sanitize($_POST['course_id']);
mysql_query("INSERT into questions (course_id, question, type) VALUES ($course_id, '$question', '$type')");
$result = mysql_query("SELECT * FROM questions ORDER BY id DESC LIMIT 1;");
$question_details = mysql_fetch_assoc($result);
$question_id = $question_details['id'];
$result1 = mysql_query("SELECT * from course WHERE id=$course_id");
$course_details = mysql_fetch_assoc($result1);
$answer = sanitize($_POST['answer']);


if($course_details['quiz_type']=='basic' && $type!='multiple'){
	mysql_query("INSERT into $type (question_id, answer) VALUES ($question_id, '$answer')");
} else {
	$opt1 = sanitize($_POST['opt1']);
	$opt2 = sanitize($_POST['opt2']);
	$opt3 = sanitize($_POST['opt3']);
	$opt4 = sanitize($_POST['opt4']);
	$correct = 'no';
	if($answer == '1'){
		$correct = 'yes';
	}
	mysql_query("INSERT into multiple_ans (question_id, option_value, correct, opt) VALUES ($question_id, '$opt1', '$correct', 1)");
	$correct = 'no';
	if($answer == '2'){
		$correct = 'yes';
	}
	mysql_query("INSERT into multiple_ans (question_id, option_value, correct, opt) VALUES ($question_id, '$opt2', '$correct', 2)");
	$correct = 'no';
	if($answer == '3'){
		$correct = 'yes';
	}
	mysql_query("INSERT into multiple_ans (question_id, option_value, correct, opt) VALUES ($question_id, '$opt3', '$correct', 3)");
	$correct = 'no';
	if($answer == '4'){
		$correct = 'yes';
	}
	mysql_query("INSERT into multiple_ans (question_id, option_value, correct, opt) VALUES ($question_id, '$opt4', '$correct', 4)");
}



?>