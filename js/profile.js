$("#profile-form").submit(function() {
    $.post("inc/profile-server.php", $("#profile-form").serialize(), function(data){
        $("#form-question").slideUp();
        $("#result").html(data);
    });
    //Important. Stop the normal POST
    return false;
});