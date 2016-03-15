<?php
                echo '<div class="text_styles" data_target="' . $_GET['include_data'][0] . '">
                	<div class="font_styles hidden_x_y">       
	                	<i class="fa fa-bold"></i> 
	                	<i class="fa fa-italic"></i> 
	                </div>

                	<div class="alignment hidden_x_y">
	                	<i class="fa fa-align-left selected"></i> 
	                	<i class="fa fa-align-center"></i> 
	                	<i class="fa fa-align-right"></i> 
	                	<i class="fa fa-align-justify"></i>
	                </div>

                    <i class="fa fa-cog"></i>
                </div>';
                echo '<label>Input Your Text</label>';
                if ($_GET['include_type'] === 'input'){
                 	echo'<input type="text" class="text_picker" data_target="' . $_GET['include_data'][0] . '">';
                } else{
                 	echo'<textarea class="text_picker" data_target="' . $_GET['include_data'][0] . '"></textarea>';                	
                }
?>
