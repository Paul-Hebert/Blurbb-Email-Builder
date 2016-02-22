    <?php
      $title = 'Email Builder';
      $base_url = '../';

      $theme = 'Mild_West';

      include('../includes/page_sections/header.php');
      include('../includes/themes/' . $theme . '/settings.php');
    ?>
    <div id="preview">
      <?php 
        include('../includes/themes/' . $theme . '/index.php');
      ?>
    </div>
    <?php include('../includes/page_sections/dashboard/index.php'); ?>
  </body>
</html>