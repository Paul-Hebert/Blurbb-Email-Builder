<?php
  if (! isset($heading1)){
    $heading1 = $_GET['heading1'];
  }
  if (! isset($message1)){
    $message1 = $_GET['message1'];
  }
  if (! isset($heading2)){
    $heading2 = $_GET['heading2'];
  }
  if (! isset($message2)){
    $message2 = $_GET['message2'];
  }
?>

<!--~~~~~~~~~~~~~~~~ Begin Code ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<table class="body">
  <tr>
    <td class="center" align="center">
      <center>
        <table class="container">
          <tr>
            <td>

<!--~~~~~~~~~~~~~~~~ Start Row 1 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

              <table class="email_row primary">
                <tr>
                  <td align="center" valign="middle" class="email_column">
                      <span class="image block n1">
                        <img src="http://www.invoice-out.com/includes/themes/Blast_Off/imgs/logo.png">
                      </span>
                  </td>
                  <td align="center" valign="middle" class="email_column">
                      <div class="header block n1">
                        <h1 class="content">Blurbb</h1>
                      </div>
                  </td>
                </tr>
              </table>

<!--~~~~~~~~~~~~~~~~ End Row 1 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~ Start Row 2 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

              <table class="email_row light">
                <tr>
                  <td class="email_column">
                    <div class="header block n2">
                      <h2 class="content">Contracting Invoice</h2>
                    </div>
                    <div class="text block n1">
                      <p class="content">For contract work on the Invoice-Out invoice creation and delivery web-app.</p>
                    </div>
                  </td>
                  <td class="email_column">
                    <div class="spreadsheet block n1">
                      <?php include($base_url . 'includes/utilities/csv_as_table.php');?>
                    </div>
                  </td>
                </tr>
              </table>

<!--~~~~~~~~~~~~~~~~ End Row 2 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~ Start Row 3 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            
              <table class="email_row primary">
                <tr>
                  <td class="email_column">
                    <div class="header block n3">
                      <h2 class="content">Thank You</h2>
                    </div>
                    <div class="text block n2">
                      <p class="content">We've enjoyed working with you and look forward to collaborating in the future!</p>
                    </div>
                  </td>
                </tr>
              </table>

<!--~~~~~~~~~~~~~~~~ End Row 3 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~ Start Row 4 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

              <table class="email_row secondary footer">
                <tr>
                  <td valign="middle" class="email_column secondary">
                    <div class="text block n3">
                      <p class="content">www.blurbb.email</p>
                    </div>
                  </td>
                </tr>
              </table>

<!--~~~~~~~~~~~~~~~~ End Row 4 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~ Ending Code ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

            </td>
          </tr>
        </table>
      </center>
    </td>
  </tr>
</table>