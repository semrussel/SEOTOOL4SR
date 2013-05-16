var flag = false;
var focus = 0;
var enabled = 0;

$(document).ready(function(){
    $('input[name=get_client]').typeahead({
        source: function(query, process) {
            $.ajax({
                url: 'modules/mod_projects/process/clients.php',
                data: {
                    "column": "user",
                    "q" : query
                },
                type: "POST",
                success: function(response) {
                	console.log(response);
		            //json = JSON.parse(response);
		            //console.log(json);
		            //for(var i=0; i<json.length; i++){
		            	$('#client_suggestions').hide(); // Hide the suggestions box
		            	$('#client_suggestions').html(response);
		            	$('#client_suggestions').fadeIn();
                        flag=true;
		            //};
                    return process(response);
                }
            });
        },
        minLength: 1
    });

     $("#get_client").blur(function(){
       $('#client_suggestions').fadeOut();
     });
});

function select(name,id){
    $("#get_client").val(name);
    $("#get_userId").val(name);
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
