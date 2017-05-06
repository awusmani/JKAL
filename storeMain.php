<?php
	
	require_once "support.php";

	
	$body = <<<EOBODY

	<div id= "loginSignUp">

		<img src= "images\JKAL_Logo.png" width="120" height="50">

		<a href= "login.php">Login</a>
		<a href= "signUp.php">Sign Up</a>
		
	</div>
	</br>
	<div class= "clearfix">

		<table>

			<tr>
			 	<th>Menu</th>
			</tr>

			<tr>
				<td>Test</td>
			</tr>

		</table>

	</div>



	


EOBODY;


$page = generatePage($body, "JKAL- Store");
echo $page;


?>