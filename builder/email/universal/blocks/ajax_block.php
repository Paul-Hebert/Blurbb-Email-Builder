<?php
	if ( isset($_GET['include_number']) ){
		$block_count[$type] = $_GET['include_number'];
		$theme = $_GET['theme'];

		include('../../themes/' . $theme . '/content.php');
	}

	include($_GET['include_type'] . '.php');
?>