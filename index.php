  <?php
    $title = 'Blurbb Email Builder';
    $base_url = '';

    include('assets/page_sections/header.php');
  ?>
  
  <div class="main_content">
    <div class="col-lg-2 col-lg-offset-3 col-xs-6">
      <?php include('assets/page_sections/logo.php'); ?>
    </div>

    <div class="col-lg-4 col-sm-6" id="landing_heading">
      <h1 class="extra-extra-large">Blurbb</h1>
      <section>
         <h2>Making HTML Email Easy</h2>
      </section>
    </div>

    <div class="col-sm-6 col-lg-offset-3">    
        <p>Coding HTML emails that look good in all the major email clients, browsers and devices is hard and time consuming. Blurbb is a drag-and-drop email builder that makes it easy to build emails that look beautiful on any device without ever having to touch code.</p>

        <p>Start with one of our many themes and then customize it to your heart's content. Blurbb is perfect for newsletters and invitations as well as automated and transactional emails.</p>

      <section>
    	   <a href='builder/' class="button col-lg-12">Get Started</a>
      </section>
    </div>
  </div>
  <?php
    include($base_url . 'assets/page_sections/scripts.php');
  ?>

