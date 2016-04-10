            <?php echo '<div class="image_picker" data-target="' . $_GET['include_data'][0] .' img">'; ?>              
                <label>Choose An Image</label>
                
                <?php 
                  $include_type = 'text';

                  include('file_picker.php'); 
                ?>

                <div class="range-slider-wrapper">
                  <?php 
                  echo '<label>Image Size</label>
                  	<input type="range" min="20" max="600" value="200" data-target="' . $_GET['include_data'][0] .'-width">'; 
                  ?>
                  <input type="text" value="200"><span> px</span>
                </div>
            </div>
