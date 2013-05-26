<?php
	//CLEAN STRING
	function filter(&$value) {
	  $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
	}
?>