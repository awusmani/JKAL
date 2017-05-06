<?php
	
	require_once "support.php";

	
	$body = "

	<div class = 'mainLogo'>
		<img src='images\JKAL_logo.png'>
	</div>

	<div class= 'centerText'>

		<p>

			Thanks ".$_POST['firstName']." ".$_POST['lastName'].", </br> we will reply to your message:</br></br>

			".$_POST['comments']."


			</br></br>at your email, ".nl2br($_POST['email'])." shortly. </br>Thank You.

		</p>

	</div>";


	$page = generatePage($body, "JKAL- Contact");
	echo $page;



