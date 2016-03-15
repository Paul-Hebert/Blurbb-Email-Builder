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
                </div>
                <label>Build Your List</label>
                <input type="text"class="text_picker" data_target="' . $_GET['include_data'][0] . '">';

?>
