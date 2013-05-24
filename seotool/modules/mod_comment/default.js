var counter = 0;
var comment_id = 0;
var counter2 = 0;
$(document).ready(function(){

   setInterval(function() {  
          var value = $("#reportId").val(); 
            $.ajax({
                type: "POST",
                url: "modules/mod_comment/process/process_pull.php",
                data: {value:value}
            }).done(function(result) {
               $("#staticComment").html(result);
            });
        
    }, 120000);
});


$(function() {
    $("#postComment").keypress(function (e) {
        if (e.shiftKey==true){

        }else if(e.which == 13) {
        	if ($.trim($(this).val())!=''){
                  var value = $("#postComment").val();
                  var reportId = $("#reportId").val();
                    $.ajax({
                        type: "POST",
                        url: "modules/mod_comment/process/process_comment.php",
                        data: {value:value, reportId:reportId}
                    }).done(function( response ) {
                        comment_id=response;
                        var hidden = "<input type='hidden' name='commentId' id='commentId" + counter + "' value='"+comment_id+"' />";
                        $(hidden).appendTo("#staticComment");
                        counter++;
                    });

                
                var userName = "<font style='font-weight:bold; font-size:13; color: #4761a2;'>" + $("#fullname").val() + "</font>";
                var userRole = "<font style='font-size:12; color: #6F7574;'>" + $("#role").val() + "</font><br />";
                var time = "<br /><font style='font-size:12; color: #6F7574; float:right;'>" + "a few seconds ago..." + "</font>";
                var inputText = "<div id='newcounter"+ counter2 +"'>" + userName + "<a id='deleter' onclick='delete_element(\"#newcounter" + counter2 + "\"," + comment_id  + "," + counter2 + ");'><img src='modules/mod_comment/delete.png' style='height:20px; float:right;' /></a><br />" + userRole + "<div style='padding-left: 30px;'>" + escapeHtml($.trim($(this).val())) + time + "</div><br /><br /></div>";
                $(inputText).appendTo("#staticComment").hide().fadeIn("slow");
                counter2++;

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

function delete_element(value, id, field){
    var strconfirm = confirm("Are you sure you want to delete this comment?");
    if (strconfirm == true){
      $(value).fadeOut();  
        if (value.substr(0,11)=="#newcounter") {
           var concat_field = "#commentId" + field; 
           var getValue=$(concat_field).val();
           $.ajax({
           type: "POST",
            url: "modules/mod_comment/process/process_delete.php",
            data: {commentId:getValue}
          }).done(function( response ) {
            
          });

        }else {
           $.ajax({
           type: "POST",
            url: "modules/mod_comment/process/process_delete.php",
            data: {commentId:id}
          }).done(function( response ) {
            
          });
        }
                   
    }
    
}
