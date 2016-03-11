    <?php    
        echo '<div class="color-selector-wrapper" data-target="' . $include_data[0] . '-' . $include_data[1] . '">
	        <label>' . $include_name . '</label>';

	        $colors = array("#000","#fff","#225378", "#1695A3", "#ACF0F2", "#BEDB39","#FFE11A","#EB7F00","#DC3522");

	        foreach($colors as $swatch){
	        	echo '<div data-color="' . $swatch . '" class="color-swatch"></div>';
	        }

	        echo '<i class="fa fa-cog"></i>';

	        if ($include_data[1] === 'background'){
	        	echo '<i class="fa fa-picture-o"></i>';
	        }

	    	echo '<p class="colorpicker-wrapper"></p>
	    </div>';
    ?>