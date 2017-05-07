<?php


		require_once "support.php";

	$body = <<<EOBODY
	<div id= "contact">
		<form action = "signUpConfirm.php" method="post" id="submit" class="signUpForm">
			<h4>Login:</h4>
			

			<input type= "text" name= "username" placeholder= "username" id="username" required>
			</br></br>

			<input type= "password" name= "password" placeholder= "password" id="password" required>
			</br></br>

			<span class="error"></span>

			</br>
			<input type= "button" name= "send" value= "Login" id="login">

		</form>

		<br />
	</div>
EOBODY;


$page = generatePage($body, "JKAL- Contact");
echo $page;




?>