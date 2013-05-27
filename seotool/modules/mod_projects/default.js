var flag = false, enabled = 1;
$(document).ready(function(){
    $('input[name=get_client]').typeahead({
        source: function(query, process){
            $.post('modules/mod_projects/process/clients.php',
                { "q" : query, "divname": "get_client", "divid": "get_userId"},
                function(response) { // Hide the suggestions box
                    $('#client_suggestions').hide().html(response).fadeIn();
                    return process(response);
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
    $("#"+name).attr("disabled", "disabled"); enabled = 0;
}
function enable(name){
    $("#"+name).removeAttr("disabled"); enabled = 1;
}
function toggle(name){
    enabled == 1 ? disable(name) : enable(name);
}
function check(){
    if($("#prependedInput").val() != '' && $("#proj_desc").val() != "" && ($("#get_client").val() != ""))
        $("#something").removeAttr("disabled");
}
function add_project(){
    $.post("modules/mod_projects/process/add_projects.php",
        { title : $("#prependedInput").val(), desc : $("#proj_desc").val(), client_id : $("#get_userId").val(), author_id : $("#author_id").val()},
        function(response) {
            if(response == 'success'){
                refresh_table(); //CLEAR FIELDS 
                $('#alert_success').fadeIn();
                $("#prependedInput").val("");
                $("#proj_desc").val("");
                $("#get_userId").val("");
                $("#author_id").val("");
                $("#get_client").val("");
            }
            else{ $('#alert_fail').fadeIn(); }
        });
}
function refresh_table(){
    $.post("modules/mod_projects/process/update_table.php", {},
     function(response){
        $("#table_refresh").fadeOut("slow", function(){
            $(this).replaceWith(response);
            $(".edit_project").hide();
            $("#table_refresh").fadeIn("slow");
        });
    });
}
function toggle_accordion(name, id){
    if($('#'+name).hasClass('active_acc')){
        $('input[id$="'+id+'"]').val('');
        $('.img').attr('src', '');    
    }//CLEAR ALL FIELDS
    $("#"+name).animate(
        {"height" : "toggle"}, { duration: 300 }, 
        function(){
        $("#"+name).fadeIn();    
    });
    setContainerHeight("current_projects");
    $("#"+name).toggleClass("inactive_acc active_acc"); //CLOSE OTHER ACTIVE CLASSES
    $(".edit_project").each(function(){
       if ($(this).hasClass('active_acc') && $(this).attr("id") != name){
            $(this).fadeOut();
            $(this).toggleClass('active_acc inactive_acc');
        }
    });
}
function give_suggestions(){
    $.post( "modules/mod_projects/process/clients.php", { "q": query }, function(response){});
}
function setContainerHeight(id) {
    var heightnow=$("#"+id).height();
    var heightfull=$("#"+id).css({height:'auto'}).height();
    $("#"+id).css({height:heightnow}).animate({ height: heightfull }, 500);
}