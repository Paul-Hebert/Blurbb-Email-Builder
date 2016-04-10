    <div class="row">
      <div id="email" class="col-lg-8 container">
        <?php 
          include('utilities/functions.php');
          
          comment('Start theme CSS');

          echo '<link id="theme_CSS" rel="stylesheet" type="text/css" href="email/themes/' . $theme . '/css/style.css">   
                <style id="added_CSS"></style>';

          comment('End theme CSS');

          include('email/themes/' . $theme . '/index.php');
        ?>
      </div>

      <div id="dashboard" class="col-lg-4 container">
        <menu id="invoice_form" enctype='multipart/form-data'>
          <section id="content_menu">
            <h2>Content</h2>

            <fieldset>
              <?php
                include('dashboard/content_picker.php');
              ?>
            </fieldset>
          </section>
          
          <section>
            <h2>Design</h2>
            
            <fieldset>
              <?php
                include('dashboard/font_picker.php'); 

                echo '<div class="subsection">';
                echo '<h3>Style 1</h3>';
                  $include_name = 'Background';
                  $include_data = ['.style1','background'];
                  include('dashboard/color_picker.php');

                  $include_name = 'Text color';
                  $include_data = ['.style1','color'];
                  include('dashboard/color_picker.php');
                echo '</div>';

                echo '<div class="subsection">';
                echo '<h3>Style 2</h3>';                
                  $include_name = 'Background';
                  $include_data = ['.style2','background'];
                  include('dashboard/color_picker.php');

                  $include_name = 'Text color';
                  $include_data = ['.style2','color'];
                  include('dashboard/color_picker.php');                
                echo '</div>';

                echo '<div class="subsection">';
                  $include_name = 'Body background';
                  $include_data = ['table.body','background'];
                  include('dashboard/color_picker.php');
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