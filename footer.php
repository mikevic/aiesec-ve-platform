    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.jgrowl.min.js"></script>

    <?php
    switch ($current_page) {
    	case 'profile.php':
    		echo '<script type="text/javascript" src="js/profile.js"></script>';
    		break;

    	case 'create-course.php':
    		echo '<script type="text/javascript" src="js/create-course.js"></script>';
    		break;

    	case 'manage-course.php':
    		echo '<script type="text/javascript" src="js/manage-course.js"></script>';
    		break;

        case 'list-courses.php':
            echo '<script type="text/javascript" src="js/list-courses.js"></script>';
            break;

        case 'quiz-setup.php':
            echo '<script type="text/javascript" src="js/quiz-setup.js"></script>';
    	
    	default:
    		# code...
    		break;
    }
    ?>
    
    
  </body>
</html>
