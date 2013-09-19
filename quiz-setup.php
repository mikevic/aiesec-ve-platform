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
        <div class="col-md-5 right-col">
          <h3>Existing questions</h3>
          <table class="table table-condensed">
          	<tr>
          		<th>Question</th>
          		<th>Type</th>
          		<th></th>
          	</tr>
          <?php
            $result1 = mysql_query("SELECT * from questions WHERE course_id=$course_id");
            while($row = mysql_fetch_assoc($result1)){
          ?>
            <tr>
              <td><?php echo $row['question']; ?></td>
              <td><?php if($row['type'] == 'line_ans'){echo 'One Liner';} else {echo ucfirst($row['type']);} ?></td>
              <td><img src="img/x.png" width="14px" id="<?php echo $row['id']; ?>" class="remove-question"></td>
            </tr>

          <?php
            }
          ?>

          </table>
        </div>
        <div class="col-md-5 right-col">
          <h3>Add a new question</h3>
          	<select id="question-type" class="form-control" required="required">
	          	<option value="">Pick Question Type</option>
	          	<option value="multiple">Multiple Choice</option>
	          	<option value="line">One Liner</option>
	          	<option value="para">Descriptive</option>
          	</select>
          	<div class="multiple hide">
              <form role="role" class="question-answer">
                <input type="text" class="form-control" name="question" placeholder="Enter Question"> 
                <input type="hidden" name="type" value="multiple">   
                <input type="hidden" name="course_id" value="<?php echo $course_id ?>"> 
            		<table>
                  <tr>
                    <td><input type="radio" name="answer" value="1"><br></td>
                    <td><input type="text" class="form-control" name="opt1" placeholder="Enter option value"></td>
                  </tr>  
                  <tr>
                    <td><input type="radio" name="answer" value="2"><br></td>
                    <td><input type="text" class="form-control" name="opt2" placeholder="Enter option value"></td>
                    
                  </tr>  
                  <tr>
                    <td><input type="radio" name="answer" value="3"><br></td>
                    <td><input type="text" class="form-control" name="opt3" placeholder="Enter option value"></td>
                    
                  </tr>  
                  <tr>
                    <td><input type="radio" name="answer" value="4"><br></td>
                    <td><input type="text" class="form-control" name="opt4" placeholder="Enter option value"></td>                   
                  </tr>  
                </table>
                  <button type="submit" class="btn btn-default">Submit</button>
              </form>
          	</div>
          	<div class="line hide">
              <br>
              <form role="form" class="question-answer">
                <div class="form-group">
                  <input type="text" class="form-control" name="question" placeholder="Enter Question"> 
                  <input type="hidden" name="type" value="line_ans">   
                  <input type="hidden" name="course_id" value="<?php echo $course_id ?>">           
                </div>
                <?php 
                  if($course_details['quiz_type']=='basic') {
                ?>
                <div class="form-group">
                  <input type="text" class="form-control" name="answer" placeholder="Enter the exact answer you are expecting"> 
                </div>
                <?php
                  }
                ?>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
          	</div>
          	<div class="para hide">
          		<br>Recommend that you use this only with the review type of quiz.
              <div class="">
                <form role="form" class="question-answer">
                  <div class="form-group">
                    <input type="text" class="form-control" name="question" placeholder="Enter Question">  
                    <input type="hidden" name="type" value="para">       
                    <input type="hidden" name="course_id" value="<?php echo $course_id ?>">       
                  </div>
                  <?php 
                    if($course_details['quiz_type']=='basic') {
                  ?>
                  <div class="form-group">
                    <textarea class="form-control" name="answer" placeholder="Enter the exact answer you are expecting"></textarea>
                  </div>
                  <?php
                    }
                  ?>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>

          	</div>
        </div>
      </div>

    <?php   
      }
    ?>
    </div><!-- /.container -->
<?php
  require 'footer.php';
?>