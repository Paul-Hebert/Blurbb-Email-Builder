
<?php
	echo '<div class="spreadsheet_picker" data-target="' . $include_data . '">
		<label>' . $include_name . '</label>';

	    $include_type = 'file';
 
		include('file_picker.php'); 
	echo '</div>';
?>
