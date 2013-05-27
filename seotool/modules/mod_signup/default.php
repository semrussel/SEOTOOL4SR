<div class="row-fluid">
	<div class="span4"></div>
	<div id="mod_signup" class="span4">
		<form name = "form_mod_signup" method="POST" action="modules/mod_signup/process/process_signup.php">
			<div class="row-fluid">
				<div class="span4 pull-right">
					<img src="img/logo.png">
					<div class="blue_div">
						<span id="seo">SEO</span>
						<span id="tool">TOOL</span>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span2">
					<h4>Signup</h4>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span10">
					<input type="text" title="Must be greater than 6 characters" class="span12" placeholder="Username..." name="username" id="username" required="required" onblur="validate(this.value, this.id)"	 />
				</div>
				<div class="span2">
					<div id="usernamePrompt"></div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span10">
					<input type="password" placeholder = "Password..." class="span12" name="password" id="password" required="required" onblur="validate(this.value, this.id)" />
				</div>
				<div class="span2">
					<div id="passwordPrompt"></div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span10">
					<input type="password" class="span12" placeholder="Confirm password..." name="password2" id="password2" required="required" onblur="validate(this.value, this.id)" />
				</div>
				<div class="span2">
					<div id="password2Prompt"></div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5">
					<input type="text" class="span12" placeholder="First Name..." name="fname" id="fname" required="required" onblur="validate(this.value, this.id)" />
				</div>
				<div class="span5">
					<input type="text" class="span12" placeholder="Last Name..." name="lname" id="lname" required="required" onblur="validate(this.value, this.id)" />
				</div>
				<div class="span2">
					<div id="fnamePrompt"></div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span10">
					<input type="email" class="span12" placeholder="Email Adress..." name="email" id="email" required="required" onblur="validate(this.value, this.id)" />
				</div>
				<div class="span2">
					<div id="emailPrompt"></div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span10">
					<input type="text" class="span12" placeholder="Company name..." name="compname" id="compname" required="required" onblur="validate(this.value, this.id)" />
				</div>
				<div class="span2">
					<div id="compnamePrompt"></div>
				</div>
			</div>
			<div class="row-fluid">
				<input type="checkbox" name="accept" id="accept" value="accept" onchange="validate(this.value, this.id)" /> Accepts terms and agreements.
			</div>
			<div class="row-fluid">
				Already have an account? <a href="?mod=mod_login">Log in.</a>
			</div>
			<div class="row-fluid">
				<input type="submit" class="btn btn-info span4" name="register" id="register" />
			</div>
		</form>			
	</div>
</div>
	<div id="msg"></div>
<script src="modules/mod_signup/default.js" type="text/javascript"></script>
