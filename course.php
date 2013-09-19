<?
require 'header.php';
$course_id = sanitize($_GET['course']);
if(isset($_GET['module'])) {
  $module = sanitize($_GET['module']);
} else {
  $module = 0;
}
$result3 = mysql_query("SELECT * from modules WHERE course_id = $course_id AND mod_order=$module");
if(mysql_num_rows($result3) == 0){
  $module = 0;
} else {
  $module_details = mysql_fetch_assoc($result3);
}
$result = mysql_query("SELECT * from subscriptions WHERE user_id=$user_id AND course_id=$course_id");
?>

    <div class="container">
    <?php 
      if(isset($authUrl)) {
    ?>
      <div class="starter-template">
        <h1>AIESEC US VE Platform</h1>
      </div>
    <?php
      } elseif (mysql_num_rows($result) == 0) {
    ?>
      <div class="starter-template">
        <h1>You have not subscribed to this course.</h1>
      </div>

    <?php
    } else {
      $result1 = mysql_query("SELECT * from course WHERE id=$course_id");
      $course_details = mysql_fetch_assoc($result1);
    ?> 
    
      <div class="row">
      <!-- Left Col -->
        <div class="col-md-2 left-col">
        <?php require 'menu.php'; ?>
         </div>

      <!-- Middle Col -->
        <div class="col-md-2 mid-col">
          <h4>Modules</h4>
          <?php
            $result2 = mysql_query("SELECT * from modules WHERE course_id = $course_id ORDER BY mod_order ASC");
            while($row = mysql_fetch_assoc($result2)){
              echo '<a href="course.php?course='.$course_id.'&module='.$row['mod_order'].'"><button type="button" class="btn btn-primary btn-xs btn-block module-button">'.$row['module_name'].'</button></a>';
            }
          ?>
        </div>

      <!-- Right Col -->  
        <div class="col-md-8 right-col">
          <?php
            if($module==0) {
          ?>
          <div class="starter-template">
            <h1><?php echo $course_details['name']; ?></h1>
            <h4>Click on first module on the right to get started</h4>
          </div>

          <?php 
            } else {
          ?>
          <div class="highlight">
            <h4><?php echo $module_details['module_name']; ?></h4>
            <hr class="module">
            <?php echo make_embed_code($module_details['platform'], $module_details['element_id']); ?> 
            <hr class="module">
            <b>Description :</b><?php echo $module_details['module_desc']; ?>
            <div>

              <span class="pull-left"><button type="button" class="btn btn-primary btn-sm btn-block navigation-button"><img src="img/back.png" width="16px" class="navigation-button"><b> Back</b></button></span>
              <span class="pull-right"><button type="button" class="btn btn-primary btn-sm btn-block navigation-button"><b>Next </b><img src="img/next.png" width="16px" class="navigation-button"></button></span>
              <br><br>
            </div>
          </div>


        </div>
      </div>

    <?php 
    }  
  }
    ?>
    </div><!-- /.container -->
<?php
  require 'footer.php';
?>