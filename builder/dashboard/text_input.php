<?php
                echo '<label for="' . $include_name . '">' . $include_name . '</label>';
                if ($include_type === 'input'){
                 	echo'<input type="text" placeholder="' . $include_name . '" name="' . $include_name . '" class="text_input" data_target="' . $include_data . '">';
                } else{
                 	echo'<textarea name="' . $include_name . '" class="text_input" data_target="' . $include_data . '">' . $include_name . '</textarea>';                	
                }
?>