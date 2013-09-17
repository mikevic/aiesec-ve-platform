$("#create-course-form").submit(function() {
    $.post("inc/create-course-server.php", $("#create-course-form").serialize(), function(data){
        $("#form-question").slideUp();
        $("#result").html(data);
    });
    //Important. Stop the normal POST
    return false;
});