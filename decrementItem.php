<?php
function decrementItem($id) {
    require_once("deleteItems.php");
    $host = "localhost";
    $user = "csuser";
    $password = "helloworld";
    $database = "shopdb";

    $db_connection = new mysqli($host, $user, $password, $database);

    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    } else {
        $query = "update items set quantity=quantity-1 where id='{$id}' and quantity>0";
    
        $result = $db_connection->query($query);

        if(!$result) {
            die("Query failed: ".$db_connection->error);
        } else {
            deleteItem($id);
        }
    }
    $db_connection->close();
}
?>