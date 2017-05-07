<?php


	require_once "support.php";
	require_once "accountsDBLogin.php";

	$database = new mysqli($host, $user, $password, $database);
	if ($database->connect_error) {
		die($database->connect_error);
	}

	$user = sanitize_string($database, trim($_POST["username"]));
	$email = sanitize_string($database, trim($_POST["email"])); 


	$sUser = sanitize_string($database, trim($_POST["username"]));
	$sEmail = sanitize_string($database, trim($_POST["email"])); 
	$phashed = password_hash("".trim($_POST['password'])."", PASSWORD_DEFAULT);
	$sFirst = sanitize_string($database, trim($_POST["firstName"]));
	$sLast = sanitize_string($database, trim($_POST["lastName"]));

	$query = "insert into accounts values('$sUser', '$sEmail', '$phashed', '$sFirst', '$sLast')";

	$result = $database->query($query);
	if (!$result) {
		die("Insertion failed: " . $database->error);
	}




	$database->close();


	$body = "
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

	function sanitize_string($db_connection, $string) {
        if (get_magic_quotes_gpc()) { 
            $string = stripslashes($string); 
        } 
        return htmlentities($db_connection->real_escape_string($string)); 
    }

	$page = generatePage($body, "JKAL- Welcome");
	echo $page;

?>
