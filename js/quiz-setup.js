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