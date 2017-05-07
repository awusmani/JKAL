<?php
    declare(strict_types=1);
	require_once "support.php";
	require_once "accountsDBLogin.php";
		
	$database = new mysqli($host, $user, $password, $database);
	if ($database->connect_error) {
		die($database->connect_error);
	}

	

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