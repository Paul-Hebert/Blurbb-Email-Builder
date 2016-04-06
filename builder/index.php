

          <?php
               $title = 'Builder';
               $base_url = '../';

               include('../includes/page_sections/header.php');

               if( isset( $_GET['theme'] ) ){
                    $theme = $_GET['theme'];

                    include('dashboard/index.php');
               } else{
                    include('theme_picker/index.php');
               }

               include($base_url . 'includes/page_sections/scripts.php');
          ?>
     </body>
</html>
