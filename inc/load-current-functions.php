<?php
$result = mysql_query("SELECT * from functions ORDER BY func_name ASC");
echo '<ul>';
while($row = mysql_fetch_assoc($result)) {
	echo '<li>'.$row['func_name'].'</li>';
}
echo '</ul>'

?>