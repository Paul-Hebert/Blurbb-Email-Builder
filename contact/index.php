<?php 
    $title = 'Contact - Blurbb';
    $base_url = '../';    
	include('../assets/page_sections/header.php'); 
?>

<div class="main_content">
		<div class="col-lg-6 col-lg-offset-3">  
			<h1>Get in Touch</h1>   

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

      					<label for="issues">Message:</label>

      					<textarea name="Issue"></textarea>
      				</div>

      				<input type="submit" value="Submit Ticket">
  				</fieldset>
				</form>
			</section> 
		</div>
</div> 

<?php
	include('../assets/page_sections/scripts.php');
?>