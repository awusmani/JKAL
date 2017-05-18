<?php
    declare(strict_types=1);
	require_once "support.php";
	require_once "accountsDBLogin.php";
	
	$body = "<h1><strong>Wishlist<strong></h1><br /><br />";

    $database = new mysqli($host, $user, $password, $database);
	if ($database->connect_error) {
		die($database->connect_error);
	}

	$sUser = $_SESSION["username"];
 
    $query = "select items from wishlist where username='$sUser'";

    $result = $database->query($query);
	if (!$result) {
		die("Query failed: " . $database->error);
	} else {
		$num_rows = $result->num_rows;
		if($num_rows === 0) {
			$body = "<h1>User does not have a wishlist</h1>";
		} else {
			$result->data_seek(0);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$jstring = $row['items'];
			$arr = json_decode($jstring);

			$body = viewWishlist($id,$arr);
		}
	}

	$database->close();

	$page = generatePage($body, "Wishlist");
	echo $page;
?>