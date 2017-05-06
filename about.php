<?php
	
	require_once "support.php";

	
	$body = <<<EOBODY

	<div class = "mainLogo">

		<img src= "images\JKAL_Logo.png">

	</div>

	<div class= "centerText">

		<p>
			JKAL is a CMSC389N Project made by Justin Kevin Abdul and Lihan. Add more shit here ya knuh 100 100 turn up for the SQUAAA bape x supreme yeezys we out here fam gang gang caravaggio
		</p>

	</div>


EOBODY;


$page = generatePage($body, "JKAL- About");
echo $page;


?>