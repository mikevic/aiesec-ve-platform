$( "#select-course" ).change(function() {
	var id = $("#select-course").val();
	var url = "manage-course.php?course_id="+id;    
 	$(location).attr('href',url);
});

$("#update-course-form").submit(function() {

	function reloadPage() {
	location.reload();
	}

    $.post("inc/update-course-server.php", $("#update-course-form").serialize(), function(data){
        $("#form-question1").slideUp();
        $("#result1").html(data);
        setTimeout(reloadPage, 2000);
    });
    //Important. Stop the normal POST
    return false;
});

$("#add-module-form").submit(function() {

	function reloadPage() {
	location.reload();
	}
	
    $.post("inc/add-module-server.php", $("#add-module-form").serialize(), function(data){
        $("#form-question2").slideUp();
        $("#result2").html(data);
        setTimeout(reloadPage, 2000);
    });
    //Important. Stop the normal POST
    return false;
});

$( ".mod_order" ).change(function() {
    var order = $(this).val();
    var id = $(this).attr('id');
    $.post("inc/update-module-order.php", {id : id, order : order}, function(data){
        $.jGrowl("Order updated!", {position : 'bottom-right', header : "Notification"});
    });    
});

$( "#select-quiz-type" ).change(function() {
    var quiz_type = $(this).val();
    var course_id = $(".course-id").val(); 
    $.post("inc/update-quiz-type.php", {course_id : course_id, quiz_type : quiz_type}, function(data){
        var url = "quiz-setup.php?course="+course_id;
        $(location).attr('href',url);
    });

});

$( ".remove-module" ).click(function() {
    function reloadPage() {
        location.reload();
    }
    var mod_id = $(this).attr('id');
    $.post("inc/remove-module.php", {mod_id : mod_id}, function(data){
        reloadPage();
    });

});