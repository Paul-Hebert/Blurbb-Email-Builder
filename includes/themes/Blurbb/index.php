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
  if (! isset($business_name)){
    $business_name = $_GET['business_name'];
  }
  if (! isset($website_url)){
    $website_url = $_GET['website_url'];
  }
  if (! isset($logo)){
    $logo = $_GET['logo'];
  }
?>

<table class="body">
  <tr>
    <td class="center" align="center">
      <center>
      <table class="container">
        <tr>
          <td>

            <table class="email_row primary">
              <tr>
                <td align="center" valign="middle" class="column">
                  <a href="http://invoice-out.com/">
                      <span class="image block n1">
                        <?php 
                          if ($logo == ""){
                            echo '<img src="http://www.invoice-out.com/includes/themes/Blast_Off/imgs/logo.png">'; 
                          } else{
                            echo '<img src="' . $logo . '">'; 
                          }
                        ?> 
                      </span>
                      <h1 class="header block n1"><?php echo $business_name; ?></h1>
                    </a>
                </td>
              </tr>
            </table>

            <table>
              <tr>
                <td height="5" width="580" class="secondary">
                </td>
              </tr>
            </table>

            <table class="email_row light">
              <tr>
                <td class="column">
                  <h2 class="header block n2"><?php echo $heading1; ?></h2>
                  <div class="text block n1">
                    <p><?php echo $message1; ?></p>
                  </div>
                </td>
                <td class="column">
                  <div class="chart block n1">
                    <?php include($base_url . 'includes/utilities/csv_as_table.php');?>
                  </div>
                </td>
              </tr>
            </table>

            <table class="email_row primary">
              <tr>
                <td class="column">
                  <h2 class="header block n3"><?php echo $heading2; ?></h2>
                  <div class="text block n2">
                    <p><?php echo $message2; ?></p>
                  </div>
                </td>
              </tr>
            </table>

            <table class="email_row secondary footer">
              <tr>
                <td valign="middle" class="column secondary">
                  <p class="text block n3">
                    <?php echo $website_url; ?>
                  </p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      </center>
    </td>
  </tr>
</table>