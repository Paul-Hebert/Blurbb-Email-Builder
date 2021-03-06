<div class="main_content">
        <div class="col-lg-6 col-lg-offset-3">
           <h1>Ready to build your e-mail?</h1>
                <div class="subsection">
                        <label for="theme_picker">Choose Your Theme</label>
                        
                        <i class='fa fa-chevron-left left arrow'></i>
                        <i class="fa fa-chevron-right right arrow"></i>

                        <?php 
                                echo '<div class="theme_thumbnails_wrapper">
                                        <div class="theme_thumbnails">';
                                                $theme_array = glob('email/themes/*' , GLOB_ONLYDIR);
                                                
                                                $set_theme = $theme_array[1];

                                                foreach($theme_array as $theme_name){
                                                        $theme_name = str_replace('email/themes/', '', $theme_name);                                        
                          
                                                        if( $set_theme === $theme_name ){
                                                                echo '<div class="theme_thumbnail selected" id="' . $theme_name . '" style="background-image:url(' . "email/themes/" . $theme_name . '/imgs/thumbnail.png);"><div>' . str_replace('_', ' ', $theme_name) . '</div></div>'; 
                                                        } else{
                                                                echo '<div class="theme_thumbnail" id="' . $theme_name . '" style="background-image:url('  . "email/themes/" . $theme_name . '/imgs/thumbnail.png);"><div>' . str_replace('_', ' ', $theme_name) . '</div></div>'; 
                                                        }
                                                }
                                        echo '</div>
                                </div>';

                                echo '<select id="theme_picker" name="theme_picker">';
                                        $theme_array = glob('email/themes/*' , GLOB_ONLYDIR);
                                        foreach($theme_array as $theme_name){
                                                $theme_name = str_replace('email/themes/', '', $theme_name);
                                              
                                                if( $set_theme === $theme_name ){
                                                        echo '<option value="' . $theme_name .'" selected>' . str_replace('_', ' ', $theme_name) . '</option>'; 
                                                } else{
                                                        echo '<option value="' . $theme_name .'">' . str_replace('_', ' ', $theme_name) . '</option>'; 
                                                }
                                        }
                                echo '</select>';
                        ?>
                </div>
                <button id="theme_selection_button" class="col-lg-12">Pick a Theme</button>
        </div>
</div>