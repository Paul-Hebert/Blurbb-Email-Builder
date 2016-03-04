            <?php echo '<div class="subsection image_picker" data-target="' . $include_data .'">'; ?>              
                <label>Choose a Picture for your Your <?php echo $include_name; ?></label>
                <input type='file' class="hidden">
                <input type="text">

                <span class="col-xs-6 input_toggle selected">Enter URL</span>
                <span class="col-xs-6 input_toggle">Upload</span>

                <div class="range-slider-wrapper">
                  <?php 
                  echo '<label for="' . $include_name . '_size">' . $include_name . ' size</label>
                  	<input type="range" min="20" max="580" value="0" data-target="' . $include_data .'-width">'; 
                  ?>
                  <input type="text" value="20"><span> px</span>
                </div>
            </div>