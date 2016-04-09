<?php
	if ( isset($_GET['include_number']) ){
		$include_number = $_GET['include_number'];
	}
	
	echo '<iframe class="video block n' . $include_number . '" width="420" height="315" src="https://www.youtube.com/embed/nUja5B8ei2U" frameborder="0" allowfullscreen></iframe>';
?>