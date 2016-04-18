<?php
	if ( isset($_GET['include_number']) ){
		$block_count[$type] = $_GET['include_number'];
	}

	include($_GET['include_type'] . '.php');
?>