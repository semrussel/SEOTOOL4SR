<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script src="modules/mod_signup/default.js" type="text/javascript"></script>

	<div align="center" id="mod_signup" >
			<form name = "form_mod_signup" method="POST" action="process_signup.php">
				<table cellpadding="0">
					<tr>
						<td><label for="username"> Username </label></td>
						<td><input type="text" name="username" id="username" required="required" onblur="validate(this.value, this.id)" /></td>
						<td id="usernamePrompt"></td>
					</tr>
					<tr>	
						<td><label for="password"> Password </label></td>
						<td><input type="password" name="password" id="password" required="required" onblur="validate(this.value, this.id)" /></td>
						<td id="passwordPrompt"></td>
					</tr>
					<tr>	
						<td><label for="password2"> Confirm Password </label></td>
						<td><input type="password" name="password2" id="password2" required="required" onblur="validate(this.value, this.id)" /></td>
						<td id="password2Prompt"></td>
					</tr>
					<tr>	
						<td><label for="fname"> First Name </label></td>
						<td><input type="text" name="fname" id="fname" required="required" onblur="validate(this.value, this.id)" /></td>
						<td id="fnamePrompt"></td>
					</tr>
					<tr>	
						<td><label for="lname"> Last Name </label></td>
						<td><input type="text" name="lname" id="lname" required="required" onblur="validate(this.value, this.id)" /></td>
						<td id="lnamePrompt"></td>
					</tr>
					<tr>	
						<td><label for="email"> Email </label></td>
						<td><input type="email" name="email" id="email" required="required" onblur="validate(this.value, this.id)" /></td>
						<td id="emailPrompt"></td>
					</tr>
					<tr>	
						<td><label for="compname"> Company Name </label></td>
						<td><input type="text" name="compname" id="compname" required="required" onblur="validate(this.value, this.id)" /></td>
						<td id="compnamePrompt"></td>
					</tr>
					<tr>
						<td><label for="utype"> User Type </label></td>
						<td><select name="utype" id="utype" onchange="validate(this.value, this.id)">
							<option value=""> --Select-- </option>
							<option value="Administrator"> Administrator </option>
							<optin value="SEO Specialist"> SEO Specialist </option>
							<option value="Client"> Client </option>
							<option value="Tigervinci"> Tigervinci </option>
						</select></td>
						<td id="utypePrompt"></td>	
					</tr>
				</table>
			</form>			
			
		
		
		<br />
		<br />
		

	</div>
