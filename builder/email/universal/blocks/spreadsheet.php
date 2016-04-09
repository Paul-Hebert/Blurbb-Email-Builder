<?php
  if ( isset($_GET['include_number']) ){
    $include_number = $_GET['include_number'];
  }
  
  echo '<div id="csv_holder" class="spreadsheet block n' . $include_number . '">';
?>
        <table id="invoice_details">
          <thead>
            <tr class="columns"><th class="style2">Description</th><th class="style2">Hours</th><th class="style2">Pay</th></tr>
          </thead>
          <tbody>
            <tr>
              <td>Orthonc tickets</td>
              <td>1.5</td>
              <td>$30.00</td>
            </tr>
            <tr>
              <td>Cabinet tickets</td>
              <td>16.5</td>
              <td>$330.00</td>
            </tr>
            <tr>
              <td>11/10 meeting</td>
              <td>0.5</td>
              <td>$10.00</td>
            </tr>
            <tr>
              <td>12/22 Meeting</td>
              <td>0.16</td>
              <td>$3.20</td>
            </tr>
            <tr>
              <td class="style2 false_border" colspan="3" height="2" width="540">
              </td>
            </tr>
          </tbody>
          <tfoot>
              <tr>
                <td>Total:</td>
                <td>43.57</td>
                <td>$871.40</td>
              </tr>
          </tfoot>
        </table>                  
  </div>