
<?php

	session_start();

	//var_dump($_SESSION);
	//GET Module Page

  $mod = "mod_login";
  if(isset($_GET['mod']))
    $mod = $_GET['mod'];

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>SEO TOOL</title>
		<meta charset="utf-8" />
	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="css/js/jquery.metadata.js"></script>
		<!--script src="css/js/jquery.autosize-min.js"></script-->
		
		<link href="css/bootstrap.css" rel="stylesheet" />
		<link href="css/bootstrap-responsive.css" rel="stylesheet" />
		
		<link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
		
		<link href="css/default.css" rel="stylesheet" />
		<link href="modules/mod_home/default.css" rel="stylesheet" />
		
		<!-- include default.css-->
		<link href="modules/<?php echo $mod; ?>/default.css" rel="stylesheet" />
		<link href="modules/mod_comment/default.css" rel="stylesheet" />

		<link href="css/reset.css" rel="stylesheet" />

	</head>
	<body>
		<div class="row-fluid">
			<div class="span12">	

				<?php 
					if(isset($_SESSION['user']))
						include "modules/mod_home/default.php"; //INCLUDE Module Page 
					else
						include "modules/$mod/default.php";
				?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<div class="footer">
					Copyright © 2013 - Solutions Resource LLC.
				</div>
			</div>
			</div>
	</body>
</html>
