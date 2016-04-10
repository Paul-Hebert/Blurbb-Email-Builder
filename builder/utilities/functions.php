<?php
	function start_email(){
		echo '<!--~~~~~~~~~~~~~~~~ Start Email ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<table class="body">
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
		</table>
		<!--~~~~~~~~~~~~~~~~ End Email ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->';
	}	


	function start_row($class){
		echo '<!--~~~~~~~~~~~~~~~~ Start Row ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<table class="email_row ' . $class . '"><tr>';
	}

	function end_row(){
		echo '</tr></table>
		<!--~~~~~~~~~~~~~~~~ End Row ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->';
	}


	function start_column($class){
		echo '<!--~~~~~~~~~~~~~~~~ Start Column ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<td class="email_column ' . $class . '">';
	}

	function end_column(){
		echo '</td>
		<!--~~~~~~~~~~~~~~~~ End Column ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->';
	}


	function append_block($type,$include_number){
		echo '<!--~~~~~~~~~~~~~~~~ Start ' . $type . ' block ' . $include_number . ' ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->';
		include('email/universal/blocks/' . $type . '.php');
		echo '<!--~~~~~~~~~~~~~~~~ End ' . $type . ' block ' . $include_number . ' ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->';
	}
?>

