<?
require 'header.php';
$course_id = sanitize($_GET['course']);
$result = mysql_query("SELECT * from course WHERE id=$course_id");
$course_details = mysql_fetch_assoc($result);
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

      <!-- 
        <div class="col-md-2 mid-col">
        </div>
      -->
      <!-- Right Col -->  
        <div class="col-md-10 right-col">
          <h3>Quiz</h3>
          <div id="form-question">
          <form role="form" id="quiz-form">
          <?php
          	$i = 1;
          	$result1 = mysql_query("SELECT * from questions WHERE course_id=$course_id");
            while($row = mysql_fetch_assoc($result1))
          	{
            	
            	$question_id = $row['id'];
            	if($row['type']=='line_ans'){
          ?>
          		<label for="<?php echo $row['id'] ?>"><?php echo $i.'. '.$row['question'] ?></label>
          		<input type="text" class="form-control" id="<?php echo $row['id'] ?>" placeholder="Answer here" name="<?php echo $row['id']; ?>">
          		<br>

          <?
            	} elseif ($row['type']=='para') {
          ?>
				<label for="<?php echo $row['id'] ?>"><?php echo $i.'. '.$row['question'] ?></label>
          		<textarea class="form-control" id="<?php echo $row['id'] ?>" placeholder="Answer here" name="<?php echo $row['id']; ?>"></textarea>
          		<br>

          <?
            	} else {
            		$result2 = mysql_query("SELECT * from multiple_ans WHERE question_id=$question_id")
          ?>
          		<label for="<?php echo $row['id'] ?>"><?php echo $i.'. '.$row['question'] ?></label>
          		<div class="radiobox">
				    <label>
				    <?php
				    	while($row1 = mysql_fetch_assoc($result2)){
				    ?>
				    	<input type="radio" name="<?php echo $row['id']; ?>" value="<?php echo $row1['opt']; ?>"> <?php echo $row1['option_value'] ?><br>
				    <?php
				    	}
				    ?>
				    </label>
  				</div>

          <?  		
            	}
            	$i = $i + 1;
            } 

          ?>
              <div class="form-group">
             	     
              </div>
           
          <?
      		
          ?>
          	  <input type="hidden" value="<?php echo $course_id; ?>" name="course_id">
          	  <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          <div id="result"></div>
        </div>
      </div>

    <?php   
      }
    ?>
    </div><!-- /.container -->
<?php
  require 'footer.php';
?>