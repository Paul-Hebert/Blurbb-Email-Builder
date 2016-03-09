<?php 
    $title = 'Support';
    $base_url = '../';    
	include('../includes/page_sections/header.php'); 
?>
		<div class="main_content">
      		<div class="col-lg-6 col-lg-offset-3">  
      			<h1>Submit your Support ticket</h1>   

      			<section>
      				<form>
      					<fieldset>
      						<div class='subsection'>
		      					<label for="from_name">Name:</label>

		      					<input name="from_name" type="text">

		      					<label for="from_email">Email:</label>

		      					<input name="from_email" type="email">
		      				</div>

      						<div class='subsection'>
		      					<label for="subject">Subject:</label>

		      					<input name="subject" type="email">

		      					<label for="issues">Issue:</label>

		      					<textarea name="Issue"></textarea>
		      				</div>

		      				<input type="submit" value="Submit Ticket">
	      				</fieldset>
      				</form>
      			</section> 
      		</div>
		</div>    
	<?php
      include($base_url . 'includes/page_sections/scripts.php');
    ?>
  </body>		
</html>