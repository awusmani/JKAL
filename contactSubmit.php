<?php
	
	require_once "support.php";

	
	$body = "

	<div id = 'logoContact'>
		<img src='images\JKAL_logo.png'>
	</div>

	<div>

		<p>

			Thanks ".$_POST['firstName']." ".$_POST['lastName'].", we will reply to your message at your email, ".$_POST['email']." shortly. Thank You.

		</p>

	</div>";


	$page = generatePage($body, "J K A L");
	echo $page;



