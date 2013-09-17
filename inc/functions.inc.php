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

function make_embed_code($platform, $id) {
	switch ($platform) {
		case 'youtube':
			$embed_code = '<iframe width="720" height="405" src="//www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe>';
			return $embed_code;
			break;
		
		case 'vimeo':
			$embed_code = '<iframe src="http://player.vimeo.com/video/'.$id.'" width="720" height="405" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
			return $embed_code;

		case 'prezi':
			$embed_code = '<iframe src="http://prezi.com/embed/'.$id.'/?bgcolor=ffffff&amp;lock_to_path=0&amp;autoplay=0&amp;autohide_ctrls=0&amp;features=undefined&amp;disabled_features=undefined" width="720" height="523" frameBorder="0"></iframe>';
			return $embed_code;

		case 'slideshare':
			$embed_code = '<iframe src="http://www.slideshare.net/slideshow/embed_code/'.$id.'" width="720" height="634.36" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>';
			return $embed_code;

		default:
			# code...
			break;
	}
}

?>