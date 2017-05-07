<?php

	include "support.php";
	
	$body = <<<EOBODY

	<div class = "mainLogo">
		<img src="images\JKAL_logo.png">
	</div>

	<div id= "contact">
		<form action = "signUpConfirm.php" method="post" id="submit">
			<h4>Sign up for JKAL:</h4>
			<input type= "text" name= "firstName" placeholder= "first name" required>
			<input type= "text" name= "lastName" placeholder= "last name" required>
			</br></br>

			<input type= "email" name= "email" placeholder= "email" required>
			</br></br>

			<input type= "password" name= "password" placeholder= "password" id="password" required>
			</br></br>

			<input type= "password" name= "confirmPassword" placeholder= "confirm password" id="confirmPassword" required>
			</br></br>

			<span id="invPass"></span>
			
			</br>
			<input type= "button" name= "send" value= "Sign Up" id="signUp">

			<script src="signUpValidation.js"></script>

		</form>
	</div>

	


EOBODY;


$page = generatePage($body, "JKAL- Contact");
echo $page;


?>