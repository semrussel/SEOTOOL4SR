<?php
	session_start();

	$id_append = 0;
	$reportid = $_POST['value'];
	$fullname = "{$_SESSION['user']['FirstName']} {$_SESSION['user']['LastName']}";

	require_once('../../../api/api_sql.php');

	date_default_timezone_set("Asia/Manila");
			$id_append=0;
			$mysql = new mysql();
			$mysql->query("SELECT c.commentid,c.content,c.datecreated,u.usertype,CONCAT_WS(' ',u.FirstName,u.LastName) as fullname FROM user u, comment c where u.userid = c.userid AND c.reportid={$reportid} ORDER BY CommentId;");

			if($mysql->row!=NULL){
				foreach($mysql->row as $rows){
					$old_date_timestamp = strtotime($rows['datecreated']);
					$new_date = date('F j, Y g:i a', $old_date_timestamp);  

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