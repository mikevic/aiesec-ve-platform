<?php

//MySQL Functions
function get_lc_list(){
	$result = mysql_query("SELECT * FROM lc_list");
	return mysql_fetch_assoc($result);
}

//General Functions 
function sanitize($input) {
	trim($input);
	return mysql_real_escape_string($input);
}

?>