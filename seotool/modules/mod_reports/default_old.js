var date = new Date(); 
var title_validation = 0;
var proj_validation = 0;
var month_validation = 0;
var file_validation = 0;

// GETMONTH() VALUES 0..11
var month = date.getMonth() + 1;
var year = date.getFullYear();

$(document).ready(function(){   
  //INITIAL OPTIONS
  $('#report_suggestions').fadeOut();
  $(".media").media();
  $('#upload_report_btn').attr('disabled', 'disabled');
  $('#input_month').attr('disabled', 'disabled');
//  $("#main_viewer").hide();

  set_filter('monthly_calendar');

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
    $("#all_reports").html(response);
  });

  //UPLOAD A REPORT VALIDATION  
  //TITLE VLIDATION
  $('#input_title').keyup(function(){
    $.ajax({
      url : "modules/mod_reports/process/validate_title.php",
      data : {
        "title" : $(this).val().trim()
      },
      type : "POST"      
    }).done(function(response){
      $('#title_validate').html(response);

      if($('#title_validation_result').attr('src')=='img/check.png'){
        title_validation++;
      }
      else{
        title_validation = 0;
      }
      validate();
    });
  });

  //MONTH YEAR VALIDATION
  $('#input_month').change(function(){
    $.ajax({
      url : "modules/mod_projects/process/check_report.php",
      data: {
        "month" : $(this).val(),
        "id" : $('#project_id').val()
      },
      type : "POST"
    }).done(function(response){
      $('#month_year_validate').html(response);
      if($('#img_src').attr('src') == 'img/check.png'){
        month_validation++;
      }
      else{
        month_validation = 0;
      }
      validate();
    })
  });

  //UPLOAD BUTTON ENABLING
  $('#project_title').keyup(function(){
    $('#input_month').attr('disabled', 'disabled');
    proj_validation = 0;
    validate();
  });

  $('#imagefile').change(function(){
    if($(this).val() != ''){
      file_validation++;
    }
    else{
      file_validation = 0;
    }
    validate();
  });


//FILTERS
  $('button[id^="cat_"]').click(function(){
    if(this.id == 'cat_month'){
      set_filter('monthly_calendar');
    }
    else if(this.id == 'cat_company'){
      set_filter('company_reports');
    }
    else if(this.id == 'cat_project'){
      set_filter('project_reports');
    }
    else if(this.id == 'cat_advanced'){
      set_filter('advanced_reports');
    }
  });
});

function set_filter(filter){
  $.ajax({
      url : "modules/mod_reports/process/"+filter+".php"
    }).done(function(response){
        $('#sort_category').fadeOut('slow', function(){
          $('#sort_category').html(response);
        });
        $('#sort_category').fadeIn('slow');
    })   
}

function validate(){
  if(title_validation > 0 &&
    proj_validation > 0 &&
    month_validation > 0 &&
    file_validation > 0){
    $('#upload_report_btn').removeAttr('disabled');
  }
  else{
    $('#upload_report_btn').attr('disabled', 'disabled');
  }
}


function suggest_reports(value){
  $.ajax({
    type: "POST",
    url: "modules/mod_reports/process/process_suggest.php",
    data: {queryString:value}
   }).done(function(result){
    if (result.length==0){
      $("#report_suggestions").hide();
    }else {
      $("#report_suggestions").html(result);
      $("#report_suggestions").fadeIn(result);
    }
  });

}

function get_project(title, id){
  $("#project_title").val(title);
  $("#project_id").val(id);
  $("#report_suggestions").fadeOut();
  $('#input_month').removeAttr('disabled');
  proj_validation++;
}

function change_preview(id){
  $("#main_viewer").fadeIn();
  $("#main_viewer").attr("href", "docs/"+id+".pdf");
  $(".media").media();
  $('#initial').fadeOut();
  $.ajax({
    url : "modules/mod_reports/process/load_pdf_details.php",
    data : {
      "id" : id
    },
    type : "POST",
    success : function(response){
      $('#pdf_details').html(response);
    }
  });
}