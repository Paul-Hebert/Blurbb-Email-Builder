            <?php echo '<div class="subsection video_picker" data-target="' . $_GET['include_data'][0] .'">'; ?>              
                <label>Choose Your Video</label>
                
                <?php 
                  $include_type = 'text';

                  include('file_picker.php'); 
                ?>

                <div class="range-slider-wrapper">
                  <?php 
                  echo '<label>Video Size</label>
                  	<input type="range" min="20" max="580" value="0" data-target="' . $_GET['include_data'][0] .'-width">'; 
                  ?>
                  <input type="text" value="20"><span> px</span>
                </div>
            </div>