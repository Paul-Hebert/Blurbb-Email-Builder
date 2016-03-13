				<?php
					if($include_type === 'text'){
						echo '<div class="file-picker">
							<input type="file" class="hidden">
			                <input type="text">

			                <span class="col-xs-6 input_toggle selected">Enter URL</span>
	                		<span class="col-xs-6 input_toggle">Upload</span>
	                	</div>';
		            } else{
						echo '<div class="file-picker">
							<input type="file">
			                <input type="text" class="hidden">

			                <span class="col-xs-6 input_toggle">Enter URL</span>
	                		<span class="col-xs-6 input_toggle selected">Upload</span>
	                	</div>';

		            }
                ?>

