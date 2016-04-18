<?php
	function start_email(){
		comment('Start email content');
		echo '<table class="body">
				  <tr>
				    <td class="center" align="center">
				      <center>
				        <table class="container">
				          <tr>
				            <td>';
	}

	function end_email(){
		echo '</td>
		          </tr>
		        </table>
		      </center>
		    </td>
		  </tr>
		</table>';
		comment('End email content');
	}	


	function start_row($class){
		//comment('Start row');
		echo '<table class="email_row ' . $class . '"><tr>';
	}

	function end_row(){
		echo '</tr></table>';
		//comment('End row');
	}


	function start_column($class){
		//comment('Start column');
		echo '<td class="email_column ' . $class . '">';
	}

	function end_column(){
		echo '</td>';
		//comment('End column');
	}


	$block_count = [
	    'image'  		=> 0,
	    'text' 			=> 0,
	    'list' 			=> 0,
	    'header' 		=> 0,
	    'spreadsheet' 	=> 0,
	    'video' 		=> 0
	];

	function append_block($type, $content){
		//comment('Start ' . $type . ' block ' . $block_count[$type]);
		global $block_count;
		$block_count[$type] ++;
		$block_count[$type] = $block_count[$type];

		include('email/universal/blocks/' . $type . '.php');
		//comment('End ' . $type . ' block ' . $block_count[$type]);
	}


	function comment($content){
		echo '<!--~~~~~~~~~~~~~~~~ ' . $content . ' ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->';
	}
?>

