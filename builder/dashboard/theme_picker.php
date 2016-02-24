        <div class="subsection">
                <label for="theme_picker">Choose Your Theme</label>
                
                <?php 
                        $theme_array = glob($base_url . 'includes/themes/*' , GLOB_ONLYDIR);
                        foreach($theme_array as $theme_name){
                                $theme_name = str_replace($base_url . 'includes/themes/', '', $theme_name);

                                echo '<div class="theme_thumbnail" id="' . $theme_name . '" style="background-image:url(' . $base_url . 'includes/themes/' . $theme_name . '/imgs/thumbnail.png);"><div>' . str_replace('_', ' ', $theme_name) . '</div></div>'; 
                        }

                        echo '<select id="theme_picker" name="theme_picker">';
                                $theme_array = glob($base_url . 'includes/themes/*' , GLOB_ONLYDIR);
                                foreach($theme_array as $theme_name){
                                        $theme_name = str_replace($base_url . 'includes/themes/', '', $theme_name);

                                        echo '<option value="' . $theme_name .'">' . str_replace('_', ' ', $theme_name) . '</option>'; 
                                }
                        echo '</select>';
                ?>
        </div>