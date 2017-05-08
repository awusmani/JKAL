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
			die("No entry exists ". $database->error);
		} else {
			$result->data_seek(0);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$jstring = $row['items'];
			$arr = json_decode($jstring);

			for($i = 0; $i < count($arr); $i++) {
				$id = $arr[$i];

				$query2 = "select * from items where id='$id[0]'";

				$result2 = $database->query($query2);
				if (!$result) {
					die("Query failed: " . $database->error);
				} else {
					$num_rows2 = $result->num_rows;
					if($num_rows === 0) {
						die("No entry exists ". $database->error);
					} else {
						for($x = 0; $x < $num_rows-1; $x++) {
							$result2->data_seek($x);
							$row2 = $result2->fetch_array(MYSQLI_ASSOC);
							$body .= "<p>".$row2["name"]."</p><br />";
						}
					}
				}
			}	
		}
	}

	$database->close();

	$page = generatePage($body, "Wishlist");
	echo $page;
?>