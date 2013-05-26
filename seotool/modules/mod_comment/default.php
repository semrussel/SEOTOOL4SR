<script src="modules/mod_comment/default.js"></script>

	<script>
			$(function(){
				$('#postComment').autosize();
			});
	</script>
	
	<div id="staticComment">
		<?php
			$fullname = "{$_SESSION['user']['FirstName']} {$_SESSION['user']['LastName']}";
			require_once('api/api_sql.php');

			date_default_timezone_set("Asia/Manila");

			$id_append = 0;
			$mysql = new mysql();
			$mysql->query("SELECT c.commentid,c.content,c.datecreated,u.usertype,CONCAT_WS(' ',u.FirstName,u.LastName) as fullname FROM user u, comment c where u.userid = c.userid AND c.reportid=1 ORDER BY CommentId;");

			if($mysql->row!=NULL){
				foreach($mysql->row as $rows){
					$old_date_timestamp = strtotime($rows['datecreated']);
					$new_date = date('F j, Y h:i a', $old_date_timestamp);  

					echo"<div id='comment_box{$id_append}'><font style='font-weight:bold; font-size:13; color: #4761a2;'>" . htmlspecialchars($rows['fullname']);
						if ($rows['fullname']===$fullname){
							echo "<a id='deleter' onclick='delete_element(\"#comment_box{$id_append}\",{$rows['commentid']},0);'><img src='modules/mod_comment/delete.png' style='height:20px; float:right;' /></a>";
						}
					echo "</font><br />";
					echo "<font style='font-size:13; color: #6F7574;'>" . htmlspecialchars($rows['usertype']) . "</font><br />";
					echo "<div style='padding-left: 30px;'>" . htmlspecialchars($rows['content']);
					echo "<br /><font style='font-size:12; color: #6F7574; float:right;'>" . htmlspecialchars($new_date) . "</font></div><br /><br /></div>";
					$id_append++;
				}
			}
		?>
	</div>


	<div class="row-fluid">
		<a href="#" id="userName"><?php echo"{$_SESSION['user']['FirstName']} {$_SESSION['user']['LastName']}"; ?></a><br/>
		<a href="#" id="userType"><?php echo"{$_SESSION['user']['UserType']}"; ?></a>

		<br />
		<form name="comment" method="POST" action="modules/mod_comment/process/process_comment.php">
			<div><textarea class="span12" name="postComment" id="postComment" autocomplete="off" placeholder="Write a comment..."></textarea></div>
			<input type="hidden" name="fullname" id="fullname" value="<?php echo htmlspecialchars("{$_SESSION['user']['FirstName']} {$_SESSION['user']['LastName']}"); ?>" />	
			<input type="hidden" name="role" id="role" value="<?php echo htmlspecialchars($_SESSION['user']['UserType']); ?>" />
			<input type="hidden" name="reportId" id="reportId" value="1" />
			<input type="submit" name="submit" id="submit" hidden="hidden" />
		</form>
	</div>
  
