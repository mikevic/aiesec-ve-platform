$("#quiz-form").submit(function() {
    $.post("inc/evaluate-quiz.php", $(this).serialize(), function(data){
        $("#form-question").slideUp();
        $("#result").html(data);
    });

    //Important. Stop the normal POST
    return false;
});