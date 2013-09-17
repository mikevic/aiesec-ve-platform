$( ".subscribe-button" ).click(function() {
  var course_id = $(this).attr('id');
  var value = $(this).val();
  var user_id = $("#userid").val();
  $.post("inc/update-subscriptions.php", {course_id : course_id, value : value, user_id : user_id}, function(data){
  });
  if(value == 'yes') {
  	$( "#"+course_id ).attr( "value", "No" );
  	$("#"+course_id).html('Unsubscribe');
  } else {
  	$( "#"+course_id ).attr( "value", "yes" );
  	$("#"+course_id).html('Subscribe');
  }
});