<?php


	require_once "support.php";
	require_once "accountsDBLogin.php";
		
	$database = new mysqli($host, $user, $password, $database);
	if ($database->connect_error) {
		die($database->connect_error);
	}



	$phashed = password_hash("".trim($_POST['password'])."", PASSWORD_DEFAULT);

	$query = "insert into accounts values('".trim($_POST["username"]).", ".trim($_POST["signUpEmail"]).", ".trim($phashed).", ".trim($_POST["firstName"]).", ".trim($_POST["lastName"])."')";
			

	$result = $database->query($query);
	if (!$result) {
		die("Insertion failed: " . $database->error);
	}
	



	$database->close();


	$body = "

		<div class = 'mainLogo'>

			<img src= 'images\JKAL_Logo.png'>

		</div>

		<div class= 'centerText'>

			<p>
				Welcome to JKAL ".trim($_POST["firstName"])."

				</br></br>

				Account Detaits:
				</br>
				<strong>First Name: </strong>".trim($_POST["firstName"])."
				</br>
				<strong>Last Name: </strong>".trim($_POST["lastName"])."
				</br>
				<strong>Username:</strong> ".trim($_POST["username"])."
				</br>
				<strong>Email:</strong> ".trim($_POST["email"])."

				</br></br>

				Buy and sell your authentic heat. enjoi

			</p>

		</div>



	";


	$page = generatePage($body, "JKAL- Welcome");
	echo $page;

?>