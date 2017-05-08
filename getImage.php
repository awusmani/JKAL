<?php
function getImage($id, $count) {
  require_once "accountsDBLogin.php";
  $host = "localhost";
  $user = "csuser";
  $password = "helloworld";
  $database = "shopdb";

  $db_connection = new mysqli($host, $user, $password, $database);

  if ($db_connection->connect_error) {
    die($db_connection->connect_error);
  } else { // Successful Connection
    /* Query */
    $query = "select imageone from items,images where items.id='{$id}'";
    /* Executing query */
    $result = $db_connection->query($query);

    if (!$result) {
      die("Query failed: ".$db_connection->error);
    } else {
      /* Number of rows found */
      $num_rows = $result->num_rows;
      if ($num_rows === 0) {
        $image = "<img src='images/placeholder.png'/>";
      } else {
        // Found something
        $result->data_seek($count);
        $retrieve = $result->fetch_array(MYSQLI_ASSOC);
        $temp = base64_encode($retrieve['imageone']);
        $image = "<img src='data:image/png;base64,".base64_encode($retrieve['imageone'])."'/>";
      }
    }
  }
  $db_connection->close();
  return $image;
}
?>
