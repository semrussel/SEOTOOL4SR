var flag = false;
var focus = 0;
var enabled = 1;
var client = 0;
var fade = false;
var idNo = 0;

$(document).ready(function(){
    $('input[name=get_client]').typeahead({
        source: function(query, process) {
            $.ajax({
                url: 'modules/mod_projects/process/clients.php',
                data: {
                    "q" : query,
                    "divname": "get_client",
                    "divid": "get_userId"
                },
                type: "POST",
                success: function(response) {
                        $('#client_suggestions').hide(); // Hide the suggestions box
                        $('#client_suggestions').html(response);
                        $('.typeahead').removeClass('dropdown-menu');
                        $('.typehead').unbind();
                        $('#client_suggestions').fadeIn();
                        flag=true;
                    return process(response);
                }
            });
        },
        minLength: 1
    });

    $("#get_client").blur(function(){
        $('#client_suggestions').fadeOut();
    });

   $("#alert_fail").hide(); 
   $("#alert_success").hide();   
   
   refresh_table(); 

   $("#something").attr("disabled","disabled"); 
   $(".collapse").collapse();
});

function select(name,id,divname,divid){
    $("#"+divname).val(name); 
    $("#"+divid).val(id);
}

function disable(name){
    var value = '#'+name;
    $(value).attr("disabled", "disabled");
    enabled = 0;
}

function enable(name){
    var value = '#'+name;
    $(value).removeAttr("disabled");
    enabled = 1;
}

function toggle(name){
    if(enabled == 1)
        disable(name);
    else
        enable(name);
}

function check(){
    console.log($("#get_userId").val());
    if($("#prependedInput").val() != '' && 
        $("#proj_desc").val() != "" &&
        ($("#get_client").val() != "" || $("#pending_client").is(':checked') == true)
    )
    $("#something").removeAttr("disabled");
}


function add_project(){

    $('#something').button();
    $('#something').on('click', function () {
        $(this).button('loading-text')
     });    

    $.ajax({
         type: "POST",
         url: "modules/mod_projects/process/add_projects.php",
        data: {
            title: $("#prependedInput").val(),
            desc: $("#proj_desc").val(),
            client_id: $("#get_userId").val(),
            author_id: $("#author_id").val()
        }
     }).done(function(response) {
            console.log(response);
            if(response == 'success'){
                console.log("ALERT HERE");
                refresh_table();
                $('#alert_success').fadeIn();
            }
            else{
                console.log("ALERT FAIL");
            }
    });
     return false;
}

function refresh_table(){
    $.ajax({
         url: "modules/mod_projects/process/update_table.php",
     }).done(function(response){
        $("#table_refresh").fadeOut("slow", function(){
           // console.log(response);
            var div = $(response).hide();
            $(this).replaceWith(div);
            $(".edit_project").hide();
            $("#table_refresh").fadeIn("slow");

            
        });
    });
}

function toggle_accordion(name, id){

    if($('#'+name).hasClass('active_acc')){
        $('input[id$="'+id+'"]').val('');
        $('.img').attr('src', '');    
    }
    //CLEAR ALL FIELDS

    $("#"+name).animate({
        "height" : "toggle"
    }, {
        duration: 300
    }, function(){
        $("#"+name).fadeIn();    
    });

    setContainerHeight("current_projects");
    $("#"+name).toggleClass("inactive_acc active_acc");
    
    //CLOSE OTHER ACTIVE CLASSES
    $(".edit_project").each(function(){
       if ($(this).hasClass('active_acc')){
            if ($(this).attr("id") != name){
                $(this).fadeOut();
                $(this).toggleClass('active_acc inactive_acc');
            }
        }
    });
}

function give_suggestions(){
    $.ajax({
         url: "modules/mod_projects/process/clients.php",
         data: {
            "q": query
         },
         type: "POST"
     }).done(function(response) {
        console.log(response);
    });
    return false;
}

function setContainerHeight(id) {
    var heightnow=$("#"+id).height();
    var heightfull=$("#"+id).css({height:'auto'}).height();
    $("#"+id).css({height:heightnow}).animate({
        height: heightfull
    }, 500);
}