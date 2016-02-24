    <?php
      $title = 'Email Builder';
      $base_url = '../../';

      $theme = $_GET['theme'];

      include($base_url . 'includes/page_sections/header.php');
      include($base_url . 'includes/themes/' . $theme . '/settings.php');
    ?>
    <div id="preview">
      <?php 
        include($base_url . 'includes/themes/' . $theme . '/index.php');
      ?>
    </div>

    <div id="dashboard">
      <header>
        <h2>Email Dashboard</h1>
      </header>

      <form id="invoice_form" action="includes/utilities/send_mail.php" enctype='multipart/form-data'>
        <section>
          <h3 class="open">Profile</h3>

          <fieldset>
            <div class="subsection">
              <label for="logo_input">Upload Your Logo</label>
              <input type='file' name="logo_input" id="logo_input">

              <div class="range-slider-wrapper">
                <label for="logo_size">Logo size</label>
                <input type="range" min="20" max="580" data-css="#logo_preview-width" value="0">
                <input type="text" value="20"><span> px</span>
              </div>
            </div>

            <div class="subsection">
              <label for="business_name">Business Name</label>
              <input type='text' placeholder="Invoice-Out" name="business_name" class="text_input" data_target="business_name">

              <label for="website_url">Website URL</label>
              <input type='text' placeholder="www.invoice-out.com" name="website_url" class="text_input" data_target="website_url">
            </div>
          </fieldset>
        </section>

        <section>
          <h3 class="open">Design</h3>
          
          <fieldset>
            <?php
              include('theme_picker.php'); 

              include('font_picker.php'); 

              echo '<div class="subsection">';
                $include_name = 'Primary background';
                $include_css = ['.primary','background'];
                include('color_picker.php');

                $include_name = 'Primary text color';
                $include_css = ['.primary','color'];
                include('color_picker.php');
              echo '</div>';

              echo '<div class="subsection">';
                $include_name = 'Secondary background';
                $include_css = ['.secondary','background'];
                include('color_picker.php');

                $include_name = 'Secondary text color';
                $include_css = ['.secondary','color'];
                include('color_picker.php');                
              echo '</div>';

              echo '<div class="subsection">';
                $include_name = 'Body background';
                $include_css = ['table.body','background'];
                include('color_picker.php');
              echo '</div>';
            ?>
          </fieldset>
        </section>

        <section>
          <h3 class="open">Content</h3>

          <fieldset>
            <div class="subsection">
              <label for="heading1">Heading 1</label>
              
              <input type='text' placeholder="Contracting Invoice" name="heading1" class="text_input" data_target="heading1">

              <label for="message1">Message Section 1</label>
              <textarea placeholder="For contract work on the Invoice-Out invoice creation and delivery web-app." name="message1" class="text_input" data_target="message1"></textarea>
            </div>
            
            <div class="subsection">
              <label for="heading2">Heading 2</label>
              <input type='text' placeholder="Thank You" name="heading2" class="text_input" data_target="heading2">

              <label for="message_2">Message Section 2</label>
              <textarea placeholder="We've enjoyed working with you and look forward to collaborating in the future!" name="message2" class="text_input" data_target="message2"></textarea>
            </div>

            <div class="subsection">
              <label for="csv_input">Upload your CSV</label>
              <input type='file' name="csv_input" id="csv_input">
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
          <!--<div class="g-recaptcha" data-sitekey="6LdINhYTAAAAALuvkN9vU8wJHP8ae1HcR0BLqiWc"></div>-->
          <button id="export_HTML">Export HTML</button>
          <!--<input type="submit" value="Send Invoice">-->
        </section>
      </form>
    </div>
  </body>
</html>    