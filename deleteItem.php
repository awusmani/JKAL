<?php
function decrementItem($id) {
    $host = "localhost";
    $user = "csuser";
    $password = "helloworld";
    $database = "shopdb";

    $db_connection = new mysqli($host, $user, $passwordk, $database);

    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    } else {
        $query = "update items set quantity=quantity-1 where id='{$id}'";
    
        $result = $db_connection->query($query);

        if(!$result) {
            die("Query failed: ".$db_connection->error);
        } else {
            $query2 = "delete from items where quantity=0";

            $delete = $db_connection->query($query);
        }
    }
}
?>