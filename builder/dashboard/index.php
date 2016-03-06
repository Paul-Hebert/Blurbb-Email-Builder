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
        <header>
          <h2>Email Dashboard</h1>
        </header>

        <menu id="invoice_form" enctype='multipart/form-data'>
          <section>
            <?php
              $include_name = 'Profile';
              include('section_heading.php');
            ?>

            <fieldset>
                <?php
                  $include_name = 'Logo';
                  $include_data = '#logo';
                  include('image_picker.php')
                ?>

              <div class="subsection">
                <?php
                  $include_name = 'Business Name';
                  $include_data = '.business_name';
                  $include_type = 'input';
                  include('text_input.php');

                  $include_name = 'Website URL';
                  $include_data = '.website_url';
                  $include_type = 'input';
                  include('text_input.php');
                ?>
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
                include('theme_picker.php'); 

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

              <div class="subsection">
                <?php 
                  $include_name = 'Heading 1';
                  $include_data = '.heading1';
                  $include_type = 'input';
                  include('text_input.php');

                  $include_name = 'Message 1';
                  $include_data = '.message1';
                  $include_type = 'textarea';
                  include('text_input.php');
                ?>
              </div>
              
              <div class="subsection">
                <?php 
                  $include_name = 'Heading 2';
                  $include_data = '.heading2';
                  $include_type = 'input';
                  include('text_input.php');

                  $include_name = 'Message 2';
                  $include_data = '.message2';
                  $include_type = 'textarea';
                  include('text_input.php');                  
                ?>
              </div>

              <div class="subsection">
                <?php
                  include('csv_picker.php');
                ?>
              </div>
            </fieldset>
          </section>

          <!--<section>
            <h3 class="open">Email</h3>

            <fieldset>
              <div class="subsection">
                <label for="to_email">To (Separate multiple emails with commas) <span class="required_asterisk">*</span></label>
                <input type='text' placeholder="johndoe@mildwestdesigns.com" name="to_email" id="to_email" required>

                <label for="from_email">From <span class="required_asterisk">*</span></label>
                <input type='email' placeholder="invoices@invoice-out.com" name="from_email" id="from_email" required>

                <input type="checkbox" checked name="copy_me" id="copy_me" value="copy"><span>Email yourself a copy</span>
              </div>

              <div class="subsection">
                <label for="subject">Subject <span class="required_asterisk">*</span></label>
                <input type='text' placeholder="Invoice Out" name="subject" id="subject" required>
              </div>
            </fieldset> 
          </section>-->

          <section>
            <!--<button id="preview_HTML">Preview HTML</button>-->
            <button id="export_HTML">Export HTML</button>
            <!--<input type="submit" value="Send Invoice">-->
          </section>
        </menu>
      </div>
    </div>
    <?php
      include($base_url . 'includes/page_sections/scripts.php');
    ?>
  </body>
</html>    