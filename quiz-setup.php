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
        <div class="col-md-5 right-col">
          <h3>Existing questions</h3>
          <table class="table table-condensed">
          	<tr>
          		<th>Question</th>
          		<th>Type</th>
          		<th>Order</th>
          		<th></th>
          	</tr>

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
          		Multiple
          	</div>
          	<div class="line hide">
          		Line
          	</div>
          	<div class="para hide">
          		Para
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