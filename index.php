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
        boo!
        </div>

      <!-- Right Col -->  
        <div class="col-md-8 right-col">
        boo!
        </div>

      </div>

    <?php   
      }
    ?>
    </div><!-- /.container -->
<?php
  require 'footer.php';
?>