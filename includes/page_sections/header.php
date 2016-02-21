<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Roboto+Slab' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <?php
            echo '<link id="theme_CSS" rel="stylesheet" type="text/css" href="includes/themes/' . $theme . '/css/style.css">';
        ?>


        <script src="js/jQuery_v1.11.1.min.js"></script>
        <script src="js/colorpicker.js"></script>
        <script src="js/functions.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    <body>
        <header id="main">
        	<nav>
           		<a href="#">Builder</a>
                <a href="#">Resources</a>
        		<a href="#">Profile</a>
        		<a href="#">Support</a>
        	</nav>
           	<a href="#">
            	<h1>
    	    		<?php echo $title ?>
    	    	</h1>
        	</a>
        </header>