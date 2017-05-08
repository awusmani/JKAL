<?php
    declare(strict_types=1);
	require_once "support.php";
	require_once "accountsDBLogin.php";

    $name = $_SESSION['name'];
    $quantity = $_SESSION['quantity'];
    $price = $_SESSION['price'];
    $category = $_SESSION['category'];
    $description = $_SESSION['description'];

    $database = new mysqli($host, $user, $password, $database);
	if ($database->connect_error) {
		die($database->connect_error);
	}

    $last_id = $_SESSION['lastid'];

    $query = "select * from images where id='$last_id'";
    $result = $database->query($query);
    if (!$result) {
        die("Query failed: " . $database->error);
    } else {
        $retrieve = $result->fetch_array(MYSQLI_ASSOC);
    }

	$database->close();

	$bottomPart = "
        <div class='page-header'>
        <h2>Item Successfully Added!</h2>
        </div><br />
        <strong>Listing: ".$name."</strong><br />

        <img src ='data:image/png;base64,".base64_encode($retrieve['imageone'])."' style='height:20em;' /><br />
        <strong>Price: $".$price."</strong><br />
        <strong>Category: ".$category."</strong><br />
        <strong>Description: ".$description."</strong><br />
";

	function sanitize_string($db_connection, $string) {
        if (get_magic_quotes_gpc()) {
            $string = stripslashes($string);
        }
        return htmlentities($db_connection->real_escape_string($string));
    }

    $body = $bottomPart;
	$page = generatePage($body, "JKAL - Listing Confirmation");
	echo $page;

?>
