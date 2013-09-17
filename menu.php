<h4>Your Dashboard</h4>
<?php
  if($user_details['user_level'] >= 1){
?>
  <b>Learn</b><br>
  <a href="list-courses.php">Courses</a>
<?php
  } 
  if ($user_details['user_level'] >= 2) {
?>
  <hr>
  <b>Manage</b><br>
<?php
  }
  if ($user_details['user_level'] >= 3) {
?>
  <hr>
  <b>Create</b><br>
    <a href="create-course.php">Create Course</a><br>
    <a href="manage-course.php">Manage Course</a>
<?php     
  }
?>
<hr>