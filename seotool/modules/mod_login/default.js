function getdetails(){
    var name = $('#username').val();
    var password = $('#password').val();

    $.ajax({
        type: "POST",
        url: "modules/mod_login/process/process_validate.php",
        data: {username:name, password:password}
    }).done(function( result ) {
        if (result === 'invalid') {
            $("#msg").html("Invalid Username or Password");
        }else {
            //get USER ROLE 
            var mod = 'mod_home';
            document.location.href='index.php?mod=mod_home';
        }
    });
    return false;

}