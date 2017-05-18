<?php
function getImage($id) {
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
    // correct one: "select id,imageone from images natural join items where id='{$id}'"
    $query = "select id,imageone from images natural join items where id='{$id}'";

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
        $result->data_seek(0);
        $retrieve = $result->fetch_array(MYSQLI_ASSOC);
        $temp = base64_encode($retrieve['imageone']);
        $image = "<img src='data:image/png;base64,".base64_encode($retrieve['imageone'])."' style='height:20em;'/>";
      }
    }
  }
  $db_connection->close();
  return $image;
}
?>
