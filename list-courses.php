<?
require 'header.php';
?>

    <div class="container">
    <?php 
      if(isset($authUrl)) {
    ?>
      <div class="starter-template">
        <h1>AIESEC US VE Platform</h1>
      </div>
    <?php
      } else {

    ?>
    
      <div class="row">
      <!-- Left Col -->
        <div class="col-md-2 left-col">
        <?php require 'menu.php'; ?>
         </div>

      <!-- Middle Col -->
        <div class="col-md-2 mid-col">
        </div>

      <!-- Right Col -->  
        <div class="col-md-8 right-col">
        	<table class="table table-condensed">
        		<tr class="active">
        			<th>Name of Course</th>
        			<th>Function</th>
        			<th>Subscribers</th>
        			<th></th>
        			<th></th>
        		</tr>
        		<?php
        			$result = mysql_query("SELECT * from course");
        			while($row = mysql_fetch_assoc($result)) {
        				echo '<tr class="active">';
        				echo '<td><a href="course.php?course='.$row['id'].'">'.$row['name'].'</td>';
        				$func_id = $row['course_func'];
        				$course_id = $row['id'];
        				$result1 = mysql_query("SELECT * from functions WHERE id=$func_id");
        				$course_func = mysql_fetch_assoc($result1);
        				$result2 = mysql_query("SELECT * from subscriptions WHERE course_id=$course_id");
        				$Subscribers = mysql_num_rows($result2);
        				echo '<td>'.$course_func['func_name'].'</td>';
        				echo '<td>'.$Subscribers.'</td>';
        				if($user_details['function']==$func_id){
        					echo '<td><img src="img/imp-icon.png"></td>';
        				} else {
        					echo '<td></td>';
        				}
        				$result3 = mysql_query("SELECT * from subscriptions WHERE course_id = $course_id AND user_id = $user_id");
        				if(mysql_num_rows($result3) == 0){
        					echo '<td><button type="button" class="btn btn-default btn-xs subscribe-button" value="yes" id="'.$course_id.'">Subscribe</button></td>';
        				} else {
        					echo '<td><button type="button" class="btn btn-default btn-xs subscribe-button" value="no" id="'.$course_id.'">Unsubscribe</button></td>';
        				}
        				echo '</tr>';
        			}
        		?>
        	</table>
        </div>
      </div>

    <?php   
      }
    ?>
    </div><!-- /.container -->
<?php
  require 'footer.php';
?>