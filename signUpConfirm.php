<?php

	include "support.php";
	include "accountsDBLogin.php";

	$database = new mysqli($host, $user, $password, $database);
	if ($database->connect_error) {
		die($database->connect_error);
	}
	
	/* Query */

	$phashed = password_hash("".trim($_POST['pass'])."", PASSWORD_DEFAULT);

	$query = "insert into accounts values('')";
			
	/* Executing query */
	$result = $database->query($query);
	if (!$result) {
		die("Insertion failed: " . $database->error);
	}
	
	/* Closing connection */
	$database->close();

?>