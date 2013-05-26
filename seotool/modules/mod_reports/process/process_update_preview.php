<?php
	if(isset($_POST['id'])){  ?>
		<a id="main_viewer" class="media {width: 800, height: 500}" href="docs/<?php echo htmlspecialchars($_POST['id']); ?>.pdf"></a>
<?php
	}
	else{ ?>
		No data to display.
<?php	
	}
?>