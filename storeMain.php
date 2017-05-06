<?php
	
	require_once "support.php";

	
	$body = <<<EOBODY

	<div>

		<img src= "images\JKAL_Logo.png">

	</div>

	


EOBODY;


$page = generatePage($body, "JKAL- Store");
echo $page;


?>