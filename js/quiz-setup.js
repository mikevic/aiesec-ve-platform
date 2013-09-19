$( "#question-type" ).change(function() {
    var question_type = $(this).val();
    if (question_type == 'multiple') {
    	$(".multiple").removeClass( "hide" );
    } else if(question_type == 'line') {
    	$(".line").removeClass( "hide" );
    } else if(question_type == 'para') {
    	$(".para").removeClass( "hide" );
    }
});

$(".question-answer").submit(function() {
    function reloadPage() {
    location.reload();
    }
    
    $.post("inc/add-question.php", $(this).serialize(), function(data){
        reloadPage();
    });

    //Important. Stop the normal POST
    return false;
});

$( ".remove-question" ).click(function() {
    function reloadPage() {
    location.reload();
    }
    var question_id = $(this).attr('id');
    $.post("inc/remove-question.php", {question_id : question_id}, function(data){
        reloadPage();
    });

});