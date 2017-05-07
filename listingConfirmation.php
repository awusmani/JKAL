<?php
    declare(strict_types=1);
	require_once "support.php";
	require_once "accountsDBLogin.php";
    session_start();
		
	$database = new mysqli($host, $user, $password, $database);
	if ($database->connect_error) {
		die($database->connect_error);
	}

    $sPrice = $_POST["price"];
    $sName = sanitize_string($database, trim($_POST["name"]));
    $sType = sanitize_string($database, trim($_POST["type"])); 
    $sDsrt = $_POST["description"];   	
    $sUser = sanitize_string($database, trim($_SERVER["username"]));
    $sQnty = $_POST["quanity"];
    $sSold = 0;
    $sImg1 = $_POST["imageone"];
    $sImg2 = $_POST["imagetwo"];
    $sImg3 = $_POST["imagethree"];



	$query = "insert into items values('', '$sPrice', '$sName', '$sType', '$sDsrt', '$sUser', '$sQnty', '$sSold')";
    //$query2 = "insert into images values()";

	$result = $database->query($query);
	if (!$result) {
		die("Insertion failed: " . $database->error);
	}
    /*
    $result2 = $database->query($query2);
	if (!$result2) {
		die("Insertion failed: " . $database->error);
	}
    */

	$database->close();


	$bottomPart = <<<EOBODY
        <p> Hello </p>
EOBODY;

	function sanitize_string($db_connection, $string) {
        if (get_magic_quotes_gpc()) { 
            $string = stripslashes($string); 
        } 
        return htmlentities($db_connection->real_escape_string($string)); 
    }

    $body = $bottomPart;
	$page = generatePage($body, "JKAL- Welcome");
	echo $page;

?>