    <?php
      $title = 'Email Builder';
      $base_url = '../../';

      $theme = $_GET['theme'];

      include($base_url . 'includes/page_sections/header.php');
      include($base_url . 'includes/themes/' . $theme . '/settings.php');
    ?>
    <div class="row">
      <div id="email" class="main_preview col-lg-8 container">
        <?php 
          echo '<link id="theme_CSS" rel="stylesheet" type="text/css" href="' . $base_url . 'includes/themes/' . $theme . '/css/style.css">';    

          include($base_url . 'includes/themes/' . $theme . '/index.php');
        ?>
      </div>

      <div id="dashboard" class="col-lg-4 container">
        <menu id="invoice_form" enctype='multipart/form-data'>
          <section id="content_menu">
            <h3>Content</h3>

            <fieldset>
              <?php
                include('content_picker.php');
              ?>
            </fieldset>
          </section>
          
          <section>
            <h3>Design</h3>
            
            <fieldset>
              <?php
                include('font_picker.php'); 

                echo '<div class="subsection">';
                  $include_name = 'Primary background';
                  $include_data = ['.primary','background'];
                  include('color_picker.php');

                  $include_name = 'Primary text color';
                  $include_data = ['.primary','color'];
                  include('color_picker.php');
                echo '</div>';

                echo '<div class="subsection">';
                  $include_name = 'Secondary background';
                  $include_data = ['.secondary','background'];
                  include('color_picker.php');

                  $include_name = 'Secondary text color';
                  $include_data = ['.secondary','color'];
                  include('color_picker.php');                
                echo '</div>';

                echo '<div class="subsection">';
                  $include_name = 'Light background';
                  $include_data = ['.light','background'];
                  include('color_picker.php');

                  $include_name = 'Light text color';
                  $include_data = ['.light','color'];
                  include('color_picker.php');                
                echo '</div>';

                echo '<div class="subsection">';
                  $include_name = 'Body background';
                  $include_data = ['table.body','background'];
                  include('color_picker.php');
                echo '</div>';
              ?>
            </fieldset>
          </section>

          <section>
            <button id="export_HTML">Export HTML</button>
          </section>
        </menu>
      </div>
    </div>
    <?php
      include($base_url . 'includes/page_sections/scripts.php');
    ?>
  </body>
</html>    