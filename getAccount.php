<?php
	/* This example assumes a table friends in the database myDB  */
	/* exists.  The table has at least two fields: name and id.   */
	/* The script displays all the records in the table           */

	require_once "accountsDBLogin.php";

	session_start();

	$db_connection = new mysqli($host, $user, $password, $database);
	if ($db_connection->connect_error) {
		die($db_connection->connect_error);
	} else {

	}

	/* Query */
	$query = "select * from accounts where username ='".trim($_POST["username"])."'";

	/* Executing query */
	$result = $db_connection->query($query);
	if (!$result) {
		die("Couldnt connect to accounts database");
	} else {
		/* Number of rows found */
		$num_rows = $result->num_rows;
		if ($num_rows === 0) {
			//username not found

		} else {

			$result->data_seek(0);
			$row = $result->fetch_array(MYSQLI_ASSOC);

			if (password_verify(trim($_POST['password']), $row['password'])) {
				$_SESSION["firstname"] = $row["firstname"];
				$_SESSION["lastname"] = $row["lastname"];
				$_SESSION["username"] = $row["username"];

				die("Login Success");
			}
			else{
				die("Incorrect Login");
			}
		}
	}

	/* Freeing memory */
	$result->close();

	/* Closing connection */
	$db_connection->close();
?>
