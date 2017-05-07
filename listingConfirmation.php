<?php
    declare(strict_types=1);
    require_once("accountsDBLogin.php");
    require_once("support.php"); 

    
    $db_connection = new mysqli($host, $user, $password, $database); 
    if ($db_connection->connect_error) { 
        die($db_connection->connect_error); 
    }

    function sanitize_string($db_connection, $string) {
        if (get_magic_quotes_gpc()) { 
            $string = stripslashes($string); 
        } 
        return htmlentities($db_connection->real_escape_string($string)); 
    }

    $bottomPart <<< EOBODY
    <p> Hello </p>
EOBODY;

    $body = $bottomPart;
    $page = generatePage($body,"Add Listing");
    echo $page;
?>