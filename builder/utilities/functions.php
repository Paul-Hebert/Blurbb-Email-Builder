<?php
	function start_email(){
		echo '<table class="body">
				  <tr>
				    <td class="center" align="center">
				      <center>
				        <table class="container">
				          <tr>
				            <td>';
	}

	function end_email(){
		echo '		</td>
		          </tr>
		        </table>
		      </center>
		    </td>
		  </tr>
		</table>';
	}	


	function start_row($class){
		echo '<table class="email_row ' . $class . '"><tr>';
	}

	function end_row(){
		echo '</tr></table>';
	}


	function start_column($class){
		echo '<td class="email_column ' . $class . '">';
	}

	function end_column(){
		echo '</td>';
	}


	function append_block($type,$include_number){
		include('email/universal/blocks/' . $type . '.php');
	}
?>

