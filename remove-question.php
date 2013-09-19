<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';

$question_id = sanitize($_POST['question_id']);
mysql_query("DELETE from questions WHERE id = $question_id");

?>