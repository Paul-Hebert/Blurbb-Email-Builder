<?php
    if ( isset($theme) ){
      $contents = file($base_url . 'includes/themes/' . $theme . '/timesheet.csv');
    } else{
      $file = $_GET['path'];
      $contents = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }

    $csvRows = array_map('str_getcsv', $contents);


    echo '<table>
          <thead>
          <tr class="columns">';
            foreach($csvRows[0] as $column){
              echo '<th class="style2">' . htmlspecialchars($column) . '</th>';
            }     
    echo '</tr>
          </thead>';

    echo '<tbody>';

    for($rows = 1; $rows < count($csvRows); $rows++) {
      if ($rows !== count($csvRows) - 1){
        echo '<tr>';
        foreach($csvRows[$rows] as $column){
          echo '<td>' . htmlspecialchars($column) . '</td>';
        }
        echo '</tr>';
      } else{
        echo '<tr>
                <td height="2" width="540" class="style2 false_border" colspan="3">
              </tr>
          </tbody>
              <tfoot>

              <tr>';
          foreach($csvRows[$rows] as $column){
            echo '<td>' . htmlspecialchars($column) . '</td>';
          }                                          
        echo '</tr>
              </tfoot>';
      }
    }
  echo '</table>';
?>