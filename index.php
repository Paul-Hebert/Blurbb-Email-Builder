    <?php
      $theme = 'Mild_West';

      include('includes/page_sections/header.php');
      include('includes/themes/' . $theme . '/settings.php');
    ?>
  <body>
    <div id="preview">
      <?php 
        include('includes/themes/' . $theme . '/index.php');
      ?>
    </div>
    <?php include('includes/dashboard/index.php'); ?>
  </body>
</html>