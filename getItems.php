<?php

function getItems() {
  require_once("accountsDBLogin.php");

  $db_connection = new mysqli($host, $user, $password, $database);

  $table="";

  if ($db_connection->connect_error) {
    die($db_connection->connect_error);
  } else { // Successful Connection
    /* Query */
    $query = "select * from items";

    /* Executing query */
    $result = $db_connection->query($query);

    if (!$result) {
      die("Retrieval failed: ". $db_connection->error);
    } else {
      /* Number of rows found */
      $num_rows = $result->num_rows;
      if ($num_rows === 0) {
        echo "<br /><br /><br /><h3 class='error'>No Items for Sale</h3>";
      } else {
        // Found row(s)
        $result->data_seek(0);
        $row = $result->fetch_array(MYSQLI_ASSOC);

        // $body .= "<table border='1'><tr>";
        //
        // // foreach ($_POST["fields"] as $key => $val) {
        // //   $body .= "<th>".ucfirst($val)."</th>";
        // // }
        // $body .= "</tr>";

        // Item Row
        $table .= "<div class='row' style='margin:0 auto;width:80%;'>";
  			for ($row_index = 0; $row_index < $num_rows; $row_index++) {
          $result->data_seek($row_index);
  				$row = $result->fetch_array(MYSQLI_ASSOC);

          $table .= <<<EOBODY
            <div class="col-sm-4">
              <div class="thumbnail">
                <img src="images/placeholder.png" alt="Item Image">
                <div class="caption">
                  <h3>{$row['name']}</h3>
                  <p>Price: \${$row['price']}</p>
                  <p>Description: {$row['description']}</p>
                  <p>Seller: {$row['username']}</p>
                  <p>Quantity: {$row['quantity']}</p>
                  <p><a class="btn btn-default btn-sm" href="#"><i class="fa fa-cart-plus fa-lg"></i> Add to Cart</a></p>
                </div>
              </div>
            </div>
EOBODY;

      } // End for loop
      $table .= "</div>";

        /* Freeing memory */
        $result->close();
      }
    }

  /* Closing connection */
  $db_connection->close();

  }
    return $table;
} // End of getItems

?>
