<?php
                echo '<div class="alignment" data_target="' . $include_data . '"><i class="fa fa-align-left"></i> <i class="fa fa-align-center"></i> <i class="fa fa-align-right"></i> <i class="fa fa-align-justify"></i></div>';
                echo '<label for="' . $include_name . '">' . $include_name . '</label>';
                if ($include_type === 'input'){
                 	echo'<input type="text" placeholder="' . $include_name . '" name="' . $include_name . '" class="text_input" data_target="' . $include_data . '">';
                } else{
                 	echo'<textarea name="' . $include_name . '" class="text_input" data_target="' . $include_data . '">' . $include_name . '</textarea>';                	
                }
?>
