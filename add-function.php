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


        <div class="col-md-5 mid-col">
          <h3>Current Functions</h3>
          <div id="current-functions">
            <?php require 'inc/load-current-functions.php'; ?>
          </div>
        </div>

      <!-- Right Col -->  
        <div class="col-md-5 right-col">
          <h3>Add Function</h3>
          <div id="form-question">
            <form role="form" id="add-function-form">
              <div class="form-group">
                <input type="text" class="form-control" name="function_name" placeholder="Enter Function Name">              
              </div>
              <input type="hidden" value="<?php echo $user_id; ?>" name="id">
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          <div class="hidden loadagain">
            <button class="btn addanother">Add another function</button>
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