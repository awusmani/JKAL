<?php

	require_once "support.php";


	$body = "
	<div class= 'centerText'>

		<p>

			Thank you ".$_POST['firstName']." , </br> we will reply to your message:</br></br>

			".$_POST['comments']."


			</br></br>at your email, ".nl2br($_POST['email'])." shortly. </br>Thank You.

		</p>

	</div>";


	$page = generatePage($body, "JKAL- Contact");
	echo $page;
