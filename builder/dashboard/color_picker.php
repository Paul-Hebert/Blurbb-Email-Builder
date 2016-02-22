    <?php    
        echo '<div class="color-selector-wrapper" data-css="' . $include_css[0] . '-' . $include_css[1] . '">
	        <label>' . $include_name . '</label>';

	        $colors = array("#000","#fff","#225378", "#1695A3", "#ACF0F2", "#BEDB39","#FFE11A","#EB7F00","#DC3522");

	        foreach($colors as $swatch){
	        	echo '<div data-color="' . $swatch . '" class="color-swatch"></div>';
	        }

	        echo '<div data-color="picker" class="color-swatch picker"></div>

	        <p class="colorpicker-wrapper">
	        </p>
	    </div>';
    ?>