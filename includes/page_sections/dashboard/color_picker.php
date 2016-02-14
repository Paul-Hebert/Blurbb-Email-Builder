    <?php    
        echo '<div class="color-selector-wrapper" id="' . strtolower($include_name) . '-' . $include_prop . '">
	        <label>' . $include_name . ' ' . $include_prop . '</label>';

	        $colors = array("#000","#fff","#225378", "#1695A3", "#ACF0F2", "#BEDB39","#FFE11A","#EB7F00","#DC3522");

	        foreach($colors as $swatch){
	        	echo '<div data-color="' . $swatch . '" class="color-swatch"></div>';
	        }

	        echo '<div data-color="picker" class="color-swatch picker"></div>

	        <p class="colorpicker-wrapper">
	        </p>
	    </div>';
    ?>