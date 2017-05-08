<?php
    require_once "support.php";
    require_once "accountsDBLogin.php";
    require_once "getImage.php";

    if(isset($_POST["submit"])){
        $_SESSION['name'] = $name;
        $_SESSION['quantity'] = $quantity;
        $_SESSION['price'] = $price;
        $_SESSION['category'] = $category;
        $_SESSION['description'] = $description;
    }

    $body = "<div class='page-header'>
    <h2>Inventory</h2>
    </div><section>";
    $db_connection = new mysqli($host, $user, $password, $database);
    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    } else {
        $sUser = $_SESSION["username"];
        /* Query */
        $query = "select * from items where username='$sUser' and quantity!=sold";

        $result = $db_connection->query($query);
        if (!$result) {
            die("Retrieval failed: ". $db_connection->error);
        } else {
            /* Number of rows found */
            $num_rows = $result->num_rows;
            if ($num_rows === 0) {
                $body = "<p>It appears you do not have any active listings :(</p>";
            } else {
                for ($row_index = 0; $row_index < $num_rows; $row_index++) {
                    $result->data_seek($row_index);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $picture = getImage($row['id']);
                    $card = <<<EOBODY
                            <div class="row col-sm-4 card-format">
                                <div class="thumbnail">
                                    $picture
                                    <div class="caption">
                                        <p><strong>Name:</strong> {$row['name']}</p>
                                        <p><strong>Price:</strong> \${$row['price']}</p>
                                        <p><strong>Quantity:</strong> {$row['quantity']}</p>
                                        <p><strong>Amount sold:</strong> {$row['sold']}</p>
                                        <p><strong>Description:</strong> {$row['description']}</p>
                                        <!--<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Edit Listing">-->
                                    </div>
                                </div>
                            </div>
EOBODY;
                    $body = $body.$card;
                }
            }
        }
    }

    $body = $body."</section>";
    /* Freeing memory */
    $result->close();

    /* Closing connection */
    $db_connection->close();

    $page = generatePage($body, "Inventory");
    echo $page;
?>
