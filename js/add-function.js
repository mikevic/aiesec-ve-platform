$("#add-function-form").submit(function() {
    $.post("inc/add-function-server.php", $("#add-function-form").serialize(), function(data){
        $("#form-question").slideUp();
        $(".loadagain").removeClass("hidden");
        $("#current-functions").html(data);
    });
    //Important. Stop the normal POST
    return false;
});

$( ".addanother" ).click(function() {
	location.reload();
});