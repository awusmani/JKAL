<?php
    declare(strict_types=1);
	require_once "support.php";
	require_once "accountsDBLogin.php";
		
	/*
    $database = new mysqli($host, $user, $password, $database);
	if ($database->connect_error) {
		die($database->connect_error);
	}
    
    $last_id = $_SESSION['lastid'];

    $query = "select imageone from images where id='$last_id'";
    $result = $database->query($query);
    if (!$result) {
        die("Query failed: " . $database->error);
    } else {
        header("Content-type: image/png");
        echo mysqli_result($result,0);
    }

	$database->close();
    */

	$bottomPart = <<<EOBODY
        <p> Hello </p><br />
EOBODY;
    $bottomPart .= "<p>".$_SESSION["pic"]."</p><br />";
    $bottomPart .= "<p>".$sImg[0]."</p>";

	function sanitize_string($db_connection, $string) {
        if (get_magic_quotes_gpc()) { 
            $string = stripslashes($string); 
        } 
        return htmlentities($db_connection->real_escape_string($string)); 
    }

    $body = $bottomPart;
	$page = generatePage($body, "Listing Confirmation");
	echo $page;

?>