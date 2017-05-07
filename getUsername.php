<?php
	/* This example assumes a table friends in the database myDB  */
	/* exists.  The table has at least two fields: name and id.   */
	/* The script displays all the records in the table           */
	
	require_once "accountsDBLogin.php"; 
		
	$db_connection = new mysqli($host, $user, $password, $database);
	if ($db_connection->connect_error) {
		die($db_connection->connect_error);
	} else {

	}
	
	/* Query */
	$query = "select username from accounts where username =".trim($_POST["username"])."";
			
	/* Executing query */
	$result = $db_connection->query($query);
	if (!$result) {
		die("Invalid Username");
	} else {
		die("Valid Username");
	}
	
	/* Freeing memory */
	$result->close();
	
	/* Closing connection */
	$db_connection->close();
?>