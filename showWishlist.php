<?php
    declare(strict_types=1);
	require_once "support.php";
	require_once "accountsDBLogin.php";
	session_start();

    $database = new mysqli($host, $user, $password, $database);
	if ($database->connect_error) {
		die($database->connect_error);
	}

	$sUser = $_SERVER["username"];
 
    $query = "select items from wishlist where username='$sUser'";

    $result = $database->query($query);
	if (!$result) {
		die("Query failed: " . $database->error);
	} else {
		$num_rows = $result->num_rows;
		if($num_rows === 0) {
			die("No entry exists ". $database->error);
		} else {
			$result->data_seek(0);
			$row = $result->fetch_array(MYSQL_ASSOIC);
			$jstring = $row['items'];
			$arr = json_decode($jstring);

			for($i = 0; $i < count($arr); $i++) {
				$id = $arr[$i];

				$query2 = "select * from items where id='$id[0]'";

				$result2 = $database->query($query2);
				if (!$result) {
					die("Query failed: " . $database->error);
				} else {
					/*
						add item to webpage to display
					*/
				}
			}	
		}
	}

	$database->close();


	$body = <<<EOBODY
	<p> Hello </p>
EOBODY;

	$page = generatePage($body, "Wishlist");
	echo $page;
?>