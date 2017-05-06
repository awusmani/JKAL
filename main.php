<?php

	
	$page = <<<EOBODY

	<html>
	    <head> 
	        <meta charset="utf-8" />
	        <title>JKAL</title>

			<link rel="stylesheet" href="style.css" />


	    </head>
	            
	    <body>
	    		<div class = "mainLogo">
					<img src="images\JKAL_logo.png">
				</div>



	            <div id= "mainLinks">

                    <a href="main.php">Home</a>
                    <a href="storeMain.php">Store</a>
                    <a href="about.php">About</a>
                    <a href="contact.php">Contact</a>

	            </div>

	    </body>
	</html>

EOBODY;


echo $page;


?>