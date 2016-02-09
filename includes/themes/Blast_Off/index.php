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
?>

<table class="body">
  <tr>
    <td class="center" align="center">
      <center>
      <table class="container">
        <tr>
          <td>

            <table class="row primary">
              <tr>
                <td align="center" valign="middle">
                <a href="http://invoice-out.com/">
                    <img src="imgs/logo.png" id="logo_preview">
                    <h1 id="title" class="business_name"><?php echo $business_name; ?></h1>
                </td>
              </tr>
            </table>

            <table>
              <tr>
                <td height="5" width="580" class="secondary">
                </td>
              </tr>
            </table>

            <table class="row light">
              <tr>
                <td>
                  <h2 class="heading1"><?php echo $heading1; ?></h2>
                  <div class="message1">
                    <p><?php echo $message1; ?></p>
                  </div>
                </td>
                <td>
                  <div id="csv_holder">
                    <?php include('includes/utilities/csv_as_table.php');?>
                  </div>
                </td>
              </tr>
            </table>

            <table class="row primary">
              <tr>
                <td>
                  <h2 class="heading2"><?php echo $heading2; ?></h2>
                  <div class="message2">
                    <p><?php echo $message2; ?></p>
                  </div>
                </td>
              </tr>
            </table>

            <table class="row secondary footer">
              <tr>
                <td valign="middle">
                  <div>
                    <a href="http://invoice-out.com/">
                      <span class="website_url secondary">
                        <?php echo $website_url; ?>
                      </span>
                    </a>
                  </div>
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