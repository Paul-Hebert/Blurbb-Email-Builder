<?php
	if ( isset($_GET['include_number']) ){
		$include_number = $_GET['include_number'];
	}

	include($_GET['include_type'] . '.php');
?>