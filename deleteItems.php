<?php
function deleteItem($id) {
    require_once("incrementSold.php");
    $host = "localhost";
    $user = "csuser";
    $password = "helloworld";
    $database = "shopdb";

    $db_connection = new mysqli($host, $user, $password, $database);
    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    } else {
        $query = "delete from items where quantity=0";
    
        $result = $db_connection->query($query);

        if(!$result) {
            die("Query failed: ".$db_connection->error);
        }  else {
            incrementSold($id);
        }
    }
    $db_connection->close();
}
?>