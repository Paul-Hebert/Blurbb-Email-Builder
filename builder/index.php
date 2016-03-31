          <?php
               $title = 'Theme Selection';
               $base_url = '../';

               include('../includes/page_sections/header.php');
          ?>
          <div class="main_content">
               <h1>Ready to build your e-mail?</h1>

               <?php 
                    $theme_array = glob($base_url . 'includes/themes/*' , GLOB_ONLYDIR);
                    
                    foreach($theme_array as $theme_name){
                       $theme_name = str_replace($base_url . 'includes/themes/', '', $theme_name);                                        

                       echo '<a class="theme_thumbnail" href="dashboard?theme=' . $theme_name . '">
                              <div class="fake_controls">
                                   <div class="close"></div>
                                   <div class="minimize"></div>
                                   <div class="maximize"></div>
                              </div>

                               <img src="' . $base_url . 'includes/themes/' . $theme_name . '/imgs/thumbnail.png">
                       </a>';
                    }
               ?>
          </div>
          <?php
               include($base_url . 'includes/page_sections/scripts.php');
          ?>
     </body>
</html>