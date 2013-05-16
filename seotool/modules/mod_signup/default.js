$(document).ready(function(){
    $("input[type=submit]").attr("disabled", "disabled");
});

var password;
var activator = [false,false,false,false,false,false,false,false];

function validate(value, fieldID){

	var result = "#" + fieldID + "Prompt";
	value = $.trim(value);

		switch(fieldID){
			case 'username':
				validateUsername(value,fieldID,result);
				activate();
				break;

			case 'password':
				validatePassword(value,fieldID,result);
				activate();
				break;

			case 'password2':
				validatePassword2(value,fieldID,result);
				activate();
				break;

			case 'fname':
				validateFname(value, fieldID,result);
				activate();
				break;

			case 'lname':
				validateLname(value, fieldID,result);
				activate();
				break;

			case 'email':
				validateEmail(value, fieldID,result);
				activate();
				break;

			case 'compname':
				validateCompname(value,fieldID,result);
				activate();
				break;

			case 'accept':
				validateAccept(value);
				activate();
				break;
			
	}
	
}

function validateUsername(value,fieldID,result){
	if (value==''){
		$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Please fill out this field</font>");
		activator[0]=false;
	}else if (value.length<7) {
		$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Username should be greater than 6 characters</font>");
		activator[0]=false;
	}else {
			$.ajax({
       			 type: "POST",
       			 url: "modules/mod_signup/process/process_validate.php",
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
    		});
	}
}

function validatePassword(value,fieldID,result) {
	if (value==''){
		$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Please fill out this field</font>");
		activator[1]=false;
	}else if (value.length<7) {
		$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Password should be greater than 6 characters</font>");
		activator[1]=false;
	}else {
		$(result).html("<img src=\"modules/mod_signup/check.png\" />");
		password=value;
		activator[1]=true;
	}	
}

function validatePassword2(value,fieldID,result){
	if (value==''){
		$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Please fill out this field</font>");
		activator[2]=false;
	}else if (value!=password) {
		$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Passwords do not match</font>");
		activator[2]=false;
	}else {
		$(result).html("<img src=\"modules/mod_signup/check.png\" />");
		activator[2]=true;
	}
}

function validateFname(value,fieldID,result) {
	if (value==''){
		$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Please fill out this field</font>");
		activator[3]=false;
	}else {
		$(result).html("<img src=\"modules/mod_signup/check.png\" />");
		activator[3]=true;
	}
}

function validateLname(value,fieldID,result) {
	if (value==''){
		$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Please fill out this field</font>");
		activator[4]=false;
	}else {
		$(result).html("<img src=\"modules/mod_signup/check.png\" />");
		activator[4]=true;
	}
}

function validateEmail(value,fieldID,result){
	if (value==''){
		$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Please fill out this field</font>");
		activator[5]=false;
	}else {		
			$.ajax({
       			 type: "POST",
       			 url: "modules/mod_signup/process/process_validate.php",
        		data: {value:value, fieldID:fieldID}
       		 }).done(function( response ) {
           		 if (response == 'valid') {
                	$(result).html("<img src=\"modules/mod_signup/check.png\" />");
                	activator[5]=true;
                	activate();
            	}else if (response=='invalid') {
               	 	$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Email already taken</font>");
               	 	activator[5]=false;
               	 	activate();
           		 }else {
           		 	$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Please follow correct email format</font>");
           		 	activator[5]=false;
           		 	activate();
           		 }
    		});
    }
}

function validateCompname(value,fieldID,result){
	if (value==''){
		$(result).html("<img src=\"modules/mod_signup/cross.png\" /><font color=\"red\"> Please fill out this field</font>");
		activator[6]=false;
	}else{
		$(result).html("<img src=\"modules/mod_signup/check.png\" />");
		activator[6]=true;
	}
}

function validateAccept(value){
	if($("#accept").is(':checked')==true){
		activator[7]=true;
	}else {
		activator[7]=false;
	}
}

function activate(){

	for (var i=0; i<8; i++){
		if (activator[i]==false){
			$("input[type=submit]").attr("disabled", "disabled");
			break;
		}
		if (i==7){
			$("input[type=submit]").removeAttr("disabled");
		}
	}

}
