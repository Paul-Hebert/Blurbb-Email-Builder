<?php
	$images = array(
		'http://www.invoice-out.com/includes/themes/Blast_Off/imgs/logo.png',
		'http://www.boardinhand.com/imgs/decks/thumb/Hypnosis.png'
	);

	echo '<div class="image block n' . $_GET['include_number'] . '">
		<img src="' . $images[array_rand($images)] . '">
	</div>';
?>