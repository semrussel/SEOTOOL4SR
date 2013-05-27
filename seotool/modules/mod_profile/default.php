<?php
	include 'api/api_sql.php';
	include 'api/api_filter.php';

	$mysql = new mysql();

	$mysql->query('SELECT * FROM USER WHERE USERID = '.$_SESSION['user']['UserId'].';');
	$user = $mysql->row;
	array_walk_recursive($user, "filter"); 
?>

<div class="row-fluid" id="user_profile">
	<div class="row-fluid">
		<div class="span3" id="profile_img">
			<div class="row-fluid">
				<img src="img/user.png" id="user" />
			</div>
			<div class="row-fluid">
				<input type="hidden" value="<?php echo $user[0]['UserId']; ?>" />
				<div class="row-fluid button_edit">
					<button class="btn btn-info span12" id="edit_profile"><i class="icon-edit icon-white"></i>Edit profile</button>
				</div>
			</div>
		</div>
		<div class="span9">
			<div class="widget" id="user_profile_div">
				<div class="widget-header">
					<i class="icon-user icon-white"></i>
					<h3>User profile</h3>
				</div>
				<div class="widget-content">
					<div class="row-fluid" id="full_name_div">
						<span id="full_name">
							<?php echo $user[0]['LastName'].', '.$user[0]['FirstName']; ?>
						</span>
						<input type="text" placeholder="<?php echo $user[0]['LastName'].', '.$user[0]['FirstName']; ?>" id="full_name_text" />
						<span class="pull-right detail">
							<?php echo $user[0]['UserType']; ?>
						</span>
					</div>
					<div class="row-fluid user_detail">
						<span class="detail span3">
							Username
						</span>
						<span id="username">
							<?php echo $user[0]['Username']; ?>
						</span>
						<input type="text" id="username_text" placeholder="<?php echo $user[0]['Username']; ?>"/>
					</div>
					<div class="row-fluid user_detail">
						<span class="detail span3">
							Email Address
						</span>
						<span id="email">
							<?php echo $user[0]['Email']; ?>
						</span>
						<input type="text" id="email_text" placeholder="<?php echo $user[0]['Email']; ?>"/>
					</div>
					<div class="row-fluid user_detail">
						<span class="detail span3">
							Company
						</span>
						<span>
							<?php echo $user[0]['CompanyName']; ?>
						</span>
					</div>
					<button class="btn btn-primary" id="edit_button">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
	</div>
</div>
<script src="modules/mod_profile/default.js"></script>