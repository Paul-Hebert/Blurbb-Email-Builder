<?php
	echo '<div class="header block n' . $block_count[$type] . '">';	
		if ( isset($content) ){
			echo '<h1 class="content">' . $content . '</h1>';
		} else{
			echo '<h1 class="content">Header</h1>';
		}
	echo '</div>';
?>