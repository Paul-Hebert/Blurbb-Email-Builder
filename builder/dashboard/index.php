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
          include($base_url . 'includes/themes/' . $theme . '/index.php');
        ?>
      </div>

      <div id="dashboard" class="col-lg-4 container">
        <menu id="invoice_form" enctype='multipart/form-data'>
          <section id="content_menu">
            <?php
              $include_name = 'Content';
              include('section_heading.php');
            ?>

            <fieldset>
              <div class="subsection">
                <?php
                  include('content_picker.php');
                ?>
              </div>

              <div id="current_picker">
              </div>
            </fieldset>
          </section>
          
          <section>
            <?php
              $include_name = 'Design';
              include('section_heading.php');
            ?>
            
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