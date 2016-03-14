            <?php echo '<div class="subsection image_picker" data-target="' . $_GET['include_data'][0] .'">'; ?>              
                <label>Choose a Picture for your Your <?php echo $_GET['include_name']; ?></label>
                
                <?php 
                  $include_type = 'text';

                  include('file_picker.php'); 
                ?>

                <div class="range-slider-wrapper">
                  <?php 
                  echo '<label for="' . $_GET['include_name'] . '_size">' . $_GET['include_name'] . ' size</label>
                  	<input type="range" min="20" max="580" value="0" data-target="' . $_GET['include_data'][0] .'-width">'; 
                  ?>
                  <input type="text" value="20"><span> px</span>
                </div>
            </div>