
<?php
	echo '<div class="spreadsheet_picker" data-target="' . $_GET['include_data'] . '">
		<label>' . $_GET['include_name'] . '</label>';

	    $include_type = 'file';
 
		include('file_picker.php'); 
	echo '</div>';
?>
