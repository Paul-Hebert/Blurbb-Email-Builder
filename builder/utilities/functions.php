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
		comment('Start row');
		echo '<table class="email_row ' . $class . '"><tr>';
	}

	function end_row(){
		echo '</tr></table>';
		comment('End row');
	}


	function start_column($class){
		comment('Start column');
		echo '<td class="email_column ' . $class . '">';
	}

	function end_column(){
		echo '</td>';
		comment('End column');
	}


	function append_block($type, $include_number, $content){
		comment('Start ' . $type . ' block ' . $include_number);

		echo '<!--~~~~~~~~~~~~~~~~ Start ' . $type . ' block ' . $include_number . ' ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->';
		include('email/universal/blocks/' . $type . '.php');
		echo '<!--~~~~~~~~~~~~~~~~ End ' . $type . ' block ' . $include_number . ' ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->';
	}

	function comment($content){
		echo '<!--~~~~~~~~~~~~~~~~ ' . $content . ' ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->';
	}
?>

