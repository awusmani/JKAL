<?php
	require_once "support.php";

	if(isset($_POST["login"])){
		$_SESSION["username"] = $_POST["username"];

		header("Location: storeMain.php");
	}

	$body = <<<EOBODY
	<div class="page-header">
	<h2>Log In</h2>
	</div>
	<div id= "contact">
		<form action = "Login.php" method="post" id="submit" class="signUpForm">

		<form action = "signUpConfirm.php" method="post" id="submit" class="signUpForm">
			<input type= "text" name= "username" placeholder= "username" id="username" required>
			</br></br>

			<input type= "password" name= "password" placeholder="password" id="password" required>

			</br></br>

			<span id ="invPass" class="error"></span>

			</br>
			<input type= "button" name= "login" value= "Login" id="login">

		</form>

		<script src="js/loginValidation.js"></script>

		<br />
	</div>
EOBODY;


$page = generatePage($body, "JKAL- Login");
echo $page;




?>
