<?php

	require_once "accountsDBLogin.php";
	require_once "support.php";

	/* Connecting to the database */
	$db_connection = new mysqli($host, $user, $password, $database);
	$body = "";

	if ($db_connection->connect_error) {
		die($db_connection->connect_error);
	} else {
		/* Check if password is verified */
		if ($_POST["password"] != $_POST["password2"]) {
			header("Location: updateApplication.php");
		}

		/* Query */
		$passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
		$sqlQuery = sprintf("update accounts set firstname='%s',lastname='%s',email='%s',password='%s' where username='%s'", trim($_POST['firstname']),trim($_POST['lastname']), trim($_POST['email']), $passwordHash,trim($_POST['username']));
		/* Executing query */
		$result = mysqli_query($db_connection, $sqlQuery);
		if (!$result) {
			die("Update failed: " . $db_connection->error);
		} else {
			// Update completed

			$body .=
				"<h2>Your information has been updated:</h2>
				<p>
				<strong>First Name: </strong>".$_POST['firstname']."<br />
				<strong>Last Name: </strong>".$_POST['lastname']."<br />
				<strong>Email: </strong> ".$_POST['email']."<br />
				</p>";
		}
	}
	/* Closing connection */
	$db_connection->close();

	$page = generatePage($body,"JKAL - Updated Account");
	echo $page;

?>
