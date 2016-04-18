<?php
	echo '<div class="image block n' . $block_count[$type] . '">';
		if ( isset($content) ){
			echo '<img src="' . $content . '">';
		} else{
			echo '<img src="' . $images[array_rand($images)] . '">';
		}
		
	echo '</div>';
?>