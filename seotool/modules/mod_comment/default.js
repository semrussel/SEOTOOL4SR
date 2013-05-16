$(function() {
    $("#postComment").keypress(function (e) {
        if (e.shiftKey==true){

        }else if(e.which == 13) {
        	if ($.trim($(this).val())!=''){
                   /* $.ajax({
                        type: "POST",
                        url: "modules/mod_signup/process/process_comment.php",
                        data: {value:value, fieldID:fieldID}
                    }).done(function( response ) {
                        if (response == 'valid') {
                        $(result).html("<img src=\"modules/mod_signup/check.png\" />");
                        activator[0]=true;
                        activate();
                    }else {
                        $(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Username already taken</font>");
                        activator[0]=false;
                        activate();
                    }
                    });*/

                var userName = "<font style='font-weight:bold; font-size:13; color: #4761a2;'>" + $("#fullname").val() + "</font><br />";
                var userRole = "<font style='font-size:12; color: #6F7574;'>" + $("#role").val() + "</font><br />";
                var inputText = "<div>" + userName + userRole + "<div style='padding-left: 30px;'>" + escapeHtml($.trim($(this).val())) + "</div></div><br /><br />";
                $(inputText).appendTo("#dynamicComment").hide().fadeIn("slow");
            }
            $(this).val("");
            $(this).css( "height","38px" );
         	e.preventDefault();  
        }else{

        }
    });
});

function escapeHtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}

