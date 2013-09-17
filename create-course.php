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
          <h3>Create Course</h3>
          <div id="form-question">
            <form role="form" id="create-course-form">
              <div class="form-group">
                <input type="text" class="form-control" name="course-name" placeholder="Enter Course Name">              
              </div>
              <div class="form-group">
                <textarea class="form-control" name="course-desc" placeholder="Enter Course Description"></textarea>
              </div>
              <div class="form-group">
                <select name="function" class="form-control" required="required">
                  <option value="">Choose Function</option>
                  <?php
                      $result = mysql_query("SELECT * FROM functions");
                      while($row = mysql_fetch_assoc($result)){
                      echo '<option value="'.$row['id'].'">'.$row['func_name'].'</option>';
                    }
                  ?>
                </select>
              </div>
              <input type="hidden" value="<?php echo $user_id; ?>" name="id">
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