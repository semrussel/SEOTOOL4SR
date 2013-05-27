var date = new Date(); 
// GETMONTH() VALUES 0..11
var month = date.getMonth() + 1;
var year = date.getFullYear();

$(document).ready(function(){
//INITIAL REPORT SUGGESTIONS
  $.ajax({
    url : "modules/mod_reports/process/report_pdf_preview.php",
    data : {
      "month" : month,
      "year" : year,
      "filter" : "month"
    },
    type : "POST"
  }).done(function(response){
    $("#dash_reports").html(response);
  });

  $.ajax({
         url: "modules/mod_projects/process/update_table.php",
     }).done(function(response){
        $("#ongoing_projects").fadeOut("slow", function(){
            $(this).replaceWith(response);
            $(".edit_project").hide();
            $("#ongoing_projects").fadeIn("slow");
        });
    });
   $('#upload_report').click(function(){
   		document.location.href = 'index.php?mod=mod_reports';
   });
   $('#create_project').click(function(){
   		document.location.href = 'index.php?mod=mod_projects';
   });
   $('#view_reports').click(function(){
   		document.location.href = 'index.php?mod=mod_reports';
   });
});