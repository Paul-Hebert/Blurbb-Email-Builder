<?php
	echo '<div class="text block n' . $block_count[$type] . '">';
		if ( isset($content) ){
			echo '<p class="content">' . $content . '</p>';
		} else{
			echo '<p class="content">' . $text[array_rand($text)] . '</p>';
		}	
	echo '</div>';
?>