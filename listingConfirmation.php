<?php
    declare(strict_types=1);
	require_once "support.php";
	require_once "accountsDBLogin.php";
		
	$database = new mysqli($host, $user, $password, $database);
	if ($database->connect_error) {
		die($database->connect_error);
	}

    $sPrice = $_SESSION["price"];
    $sName = sanitize_string($database, trim($_SESSION["name"]));
    $sType = sanitize_string($database, trim($_SESSION["category"])); 
    $sDsrt = sanitize_string($database, $_SESSION["description"]); 
    $sUser = 'testacc';  	
    //$sUser = sanitize_string($database, trim($_SESSION["username"]));
    $sQnty = $_SESSION["quantity"];
    $sSold = 0;
    $sImg = glob("upload/".$_SESSION["pic"]);
    //$sImg2 = $_SESSION["imagetwo"];
    //$sImg3 = $_SESSION["imagethree"];

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
	$page = generatePage($body, "Listing Confirmation");
	echo $page;

?>