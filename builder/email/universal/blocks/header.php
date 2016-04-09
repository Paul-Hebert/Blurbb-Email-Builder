<?php
	if ( isset($_GET['include_number']) ){
		$include_number = $_GET['include_number'];
	}

	echo '<div class="header block n' . $include_number . '">
		<h1 class="content">Header</h1>
	</div>';
?>