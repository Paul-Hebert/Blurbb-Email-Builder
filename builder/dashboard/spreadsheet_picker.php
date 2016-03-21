
<?php
	echo '<div class="spreadsheet_picker subsection" data-target="' . $_GET['include_data'][0] . '">
		<label>Upload Your Spreadsheet</label>';

	    $include_type = 'file';
 
		include('file_picker.php'); 
	echo '</div>';
?>
