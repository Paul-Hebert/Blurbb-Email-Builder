        <div class="subsection">
                <label for="theme_picker">Choose Your Theme</label>
                
                <!--<select id="theme_picker" name="theme_picker">-->
                <?php 
                	/*$theme_array = glob('includes/themes/*' , GLOB_ONLYDIR);
                	foreach($theme_array as $theme_name){
                		$theme_name = str_replace('includes/themes/', '', $theme_name);
                		$theme_name = str_replace('_', ' ', $theme_name);

                		echo '<option>' . $theme_name . '</option>'; 
                	}*/

                        $theme_array = glob('includes/themes/*' , GLOB_ONLYDIR);
                        foreach($theme_array as $theme_name){
                                $theme_name = str_replace('includes/themes/', '', $theme_name);
                                $theme_name = str_replace('_', ' ', $theme_name);

                                echo '<div class="theme_thumbnail"><div>' . $theme_name . '</div></div>'; 
                        }
                ?>
                <!--</select>-->
        </div>