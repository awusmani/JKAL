<?php
function incrementSold($id) {
    $host = "localhost";
    $user = "csuser";
    $password = "helloworld";
    $database = "shopdb";

    $db_connection = new mysqli($host, $user, $password, $database);
    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    } else {
        $query = "update items set sold=sold+1 where id='{$id}'";
    
        $result = $db_connection->query($query);

        if(!$result) {
            die("Query failed: ".$db_connection->error);
        }
    }
    $db_connection->close();
}
?>