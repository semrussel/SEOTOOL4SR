<div id="mod_login">	
	<div class="row-fluid">
		<div class="span5">
			<div class="login">
				<div class="row-fluid">
					<div class="span3 logo_div">
						<img src="img/logo.png">
						<div class="blue_div">
							<span id="seo">SEO</span>
							<span id="tool">TOOL</span>
						</div>
					</div>
				</div>
				<br />
				<div class="row-fluid">
					<div class="span12">
						<form name="form_mod_login" onsubmit="return getdetails();">
							<div class="row-fluid">
								<div class="span12">
									<span class="title">Login</span>
								</div>
								<div class="span4">
									<input class="login_input" type="text" placeholder= "Username..." name="username" id="username" />
								</div>
								<div class="span4">
									<td><input class="login_input" type="password" placeholder= "Password..." name="password" id="password" /></td>
								</div>
								<div class="span3 login_btn_div">
									<td><input class="login_btn btn" type="submit" name="login" value="Log In"/></td>
								</div>
							</div>
							<div class="row-fluid" style="margin-left: 10px; color: #D00;">
								<div id="msg"></div>
							</div>
							<div class="row-fluid" style="margin-left: 10px;">
								<div class="span12">
									<input type="checkbox" name="always_login" value="1" id="always_login"><label for="always_login"> Keep me logged in </label>
								</div>
							</div>
							<div class="row-fluid" style="margin-left: 10px;">
								<div class="span12">
									No account? <span class="sign-up"><a href="modules/mod_signup/default.php">Sign up now!</a></span>
								</div>
							</div>
							<div class="blue-divider"></div>
							<div class="row-fuid" style="text-align: center;">
								<a href="#">Contact Us</a>&nbsp;|&nbsp;
								<a href="#">Visit Solutions Resource LLC.</a>&nbsp;|&nbsp;
								<a href="#">About us</a>
							</div>
							</table>
						</form>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>
<script src="modules/mod_login/default.js" type="text/javascript"></script>