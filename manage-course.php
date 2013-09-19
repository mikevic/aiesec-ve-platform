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

      <!-- 
        <div class="col-md-2 mid-col">
        </div>
      -->

      <!-- Right Col -->  
        <div class="col-md-10 right-col">
          <h3>Manage Course</h3>
          <?php
            if(!isset($_GET['course_id'])) {
          ?>
          <div id="form-question">
            <div class="form-group">
              <select name="function" class="form-control" required="required" id="select-course">
                <option value="">Pick a course to manage</option>
                <?php
                    $result = mysql_query("SELECT * FROM course");
                    while($row = mysql_fetch_assoc($result)){
                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                  }
                ?>
              </select>
            </div>
          </div>

          <?
            } else {
              $course_id = sanitize($_GET['course_id']);
          ?>
              <input type="hidden" class="course-id" value="<?php echo $course_id; ?>">
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Basic Settings
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <div id="form-question1">
                      <?php
                          $result = mysql_query("SELECT * FROM course WHERE id=$course_id");
                          $row = mysql_fetch_assoc($result);
                      ?>
                        <form role="form" id="update-course-form">
                          <div class="form-group">
                            <input type="text" class="form-control" name="course-name" value="<?php echo $row['name']; ?>">              
                          </div>
                          <div class="form-group">
                            <textarea class="form-control" name="course-desc"><?php echo $row['course_desc']; ?></textarea>
                          </div>
                          <div class="form-group">
                            <select name="function" class="form-control" required="required">
                              <option value="">Choose Function</option>
                              <?php
                                  $result = mysql_query("SELECT * FROM functions");
                                  while($row1 = mysql_fetch_assoc($result)){
                                    if($row1['id'] == $row['course_func']) {
                                      echo '<option value="'.$row1['id'].'" selected>'.$row1['func_name'].'</option>';
                                    } else {
                                      echo '<option value="'.$row1['id'].'">'.$row1['func_name'].'</option>';
                                    }
                                  }
                              ?>
                            </select>
                          </div>
                          <input type="hidden" value="<?php echo $course_id; ?>" name="course_id">
                          <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                      </div>
                      <div id="result1"></div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Add Module
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div id="form-question2">
                      <?php
                          $result = mysql_query("SELECT * FROM course WHERE id=$course_id");
                          $row = mysql_fetch_assoc($result);
                      ?>
                        <form role="form" id="add-module-form">
                          <div class="form-group">
                            <input type="text" class="form-control" name="module-name" placeholder="Enter module name here">              
                          </div>
                          <div class="form-group">
                            <textarea class="form-control" name="module-desc" placeholder="Enter module description here"></textarea>
                          </div>
                          <div class="form-group">
                            <select name="platform" class="form-control" required="required">
                              <option value="">Choose Platform</option>
                              <option value="youtube">YouTube</option>
                              <option value="vimeo">Vimeo</option>
                              <option value="slideshare">SlideShare</option>
                              <option value="prezi">Prezi</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="element-id" placeholder="Enter platform element ID here">    
                          </div>
                          <input type="hidden" value="<?php echo $course_id; ?>" name="course_id">
                          <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
                          <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                      </div>
                      <div id="result2"></div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Order Modules
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <table class="table table-striped">
                      <tr>
                        <th>Module Name</th>
                        <th>Platform</th>
                        <th>Element ID</th>
                        <th>Order</th>
                      </tr>
                      <?php
                        $result = mysql_query("SELECT * from modules WHERE course_id = $course_id ORDER BY mod_order ASC");
                        $rows = mysql_num_rows($result);
                        while($row = mysql_fetch_assoc($result)){
                            echo '<tr>';
                            echo '<td>'.$row['module_name'].'</td>';
                            echo '<td>'.$row['platform'].'</td>';
                            echo '<td>'.$row['element_id'].'</td>';
                            echo '<td id="'.$row['id'].'"><select class="mod_order" id="'.$row['id'].'">';
                            for($i = 1; $i <= $rows; $i++){
                              if($i == $row['mod_order']) {
                                echo '<option value="'.$i.'" selected>'.$i.'</option>';
                              } else {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                              }
                            }
                            echo '</td></select>';
                            echo '</tr>';
                        }
                      ?>
                    </table>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        Quiz
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse">
                    <?php
                      if($row['quiz_type']=="") {
                    ?>
                    <div class="panel-body">
                      <div class="form-group">
                        <select name="function" class="form-control" required="required" id="select-quiz-type">
                          <option value="">Select type of quiz to implement in this course</option>
                          <option value="basic">Basic Quiz</option>
                          <option value="review">Review Quiz</option>
                        </select>
                      </div>
                    </div>
                    <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
          <?php
            }
          ?>

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