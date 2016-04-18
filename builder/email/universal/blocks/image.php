<?php
	$images = array(
		'https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Kitten_in_Rizal_Park%2C_Manila.jpg/460px-Kitten_in_Rizal_Park%2C_Manila.jpg',
		'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Laitche-P013.jpg/440px-Laitche-P013.jpg',
		'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Youngkitten.JPG/440px-Youngkitten.JPG',
		'https://upload.wikimedia.org/wikipedia/commons/c/c9/Cat-MaineCoon-Cookie.png',
		'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Kitten_and_partial_reflection_in_mirror.jpg/594px-Kitten_and_partial_reflection_in_mirror.jpg',
		'https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Bobcat-Texas-9110.jpg/800px-Bobcat-Texas-9110.jpg',
		'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Persian_Cat_%28kitten%29.jpg/1280px-Persian_Cat_%28kitten%29.jpg',
		'https://upload.wikimedia.org/wikipedia/commons/7/7f/Macicky.jpg',
		'https://upload.wikimedia.org/wikipedia/commons/c/c1/Six_weeks_old_cat_%28aka%29.jpg',
		'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Poezenbeesten.JPG/1280px-Poezenbeesten.JPG',
		'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/2006-07-09_katze2.jpg/2560px-2006-07-09_katze2.jpg',
		'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Louis-%26-Chanel-taking-a-nap.jpg/1920px-Louis-%26-Chanel-taking-a-nap.jpg'
	);

	echo '<div class="image block n' . $block_count[$type] . '">';
		if ( isset($content) ){
			echo '<img src="' . $content . '">';
		} else{
			echo '<img src="' . $images[array_rand($images)] . '">';
		}
		
	echo '</div>';
?>