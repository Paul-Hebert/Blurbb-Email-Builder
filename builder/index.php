

          <?php
               $title = 'Builder';
               $base_url = '../';

               include('../assets/page_sections/header.php');

               if( isset( $_GET['theme'] ) ){
                    $theme = $_GET['theme'];

                    include('dashboard/index.php');
               } else{
                    include('theme_picker/index.php');
               }

               include($base_url . 'assets/page_sections/scripts.php');
          ?>
     </body>
</html>
