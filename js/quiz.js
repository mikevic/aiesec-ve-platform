$("#quiz-form").submit(function() {
    function reloadPage() {
    location.reload();
    }
    
    $.post("inc/evaluate-quiz.php", $(this).serialize(), function(data){
        
    });

    //Important. Stop the normal POST
    return false;
});