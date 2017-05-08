<?php


	require_once "support.php";
	require_once "accountsDBLogin.php";
	


	$body = <<<EOBODY

	<div class="page-header">
	<h2>Sign Up</h2>
	</div>
	<div id= "contact">
		<form action = "signUpConfirm.php" method="post" id="submit" class="signUpForm">
			<input type= "text" name= "firstName" placeholder= "first name" required>
			<input type= "text" name= "lastName" placeholder= "last name" required>
			</br></br>

			<input type= "email" name= "email" placeholder= "email" required style="width:20em;">
			</br></br>

			<input type= "text" name= "username" placeholder= "username" id="username" required>
			</br></br>

			<input type= "password" name= "password" placeholder= "password" id="password" required>
			</br></br>

			<input type= "password" name= "confirmPassword" placeholder= "confirm password" id="confirmPassword" required>
			</br><br />
			<span id="invPass" id="invPass" class="error"></span>
			</br><br />
			<input type= "button" name= "send" value= "Sign Up" id="signUp">
		</form>
		<script src="js/signUpValidation.js"></script>
		<br />
	</div>
EOBODY;


$page = generatePage($body, "JKAL- Sign Up");
echo $page;
?>
