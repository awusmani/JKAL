<?php
    require_once "support.php";
    require_once "accountsDBLogin.php";
    require_once "getImage.php";

    $db_connection = new mysqli($host, $user, $password, $database);

    $body = "<div class='page-header'>
    <h2>Inventory</h2>
    </div><section>";

    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    } else {
        if (isset($_POST["submit"])) {
            $id = $_POST['id'];
            $item = $_POST['name'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            $sPrice = sanitize_string($db_connection, trim($price));
            $sItem = sanitize_string($db_connection, trim($item));
            $sDsrt = sanitize_string($db_connection, trim($description));
            $category = $_POST['category'];

            $update = "update items set name='$sItem', quantity='$quantity', price='$sPrice', type='$category', description='$sDsrt' where id='$id'";

            if (!$db_connection->query($update)) {
                die("Retrieval failed: " . $db_connection->error);
            }
        }

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

                    $category="";
                    if($row['type'] === "Accessories"){
                        $category="<option selected='selected'>Accessories</option>
                                   <option>Art</option>
                                   <option>Books</option>
                                   <option>Clothing</option>
                                   <option>Computers</option>
                                   <option>Electronics</option>
                                   <option>Music</option>
                                   <option>Other</option>";
                    }elseif ($row['type'] === "Art"){
                        $category="<option>Accessories</option>
                                   <option selected='selected'>Art</option>
                                   <option>Books</option>
                                   <option>Clothing</option>
                                   <option>Computers</option>
                                   <option>Electronics</option>
                                   <option>Music</option>
                                   <option>Other</option>";
                    }elseif ($row['type'] === "Books"){
                        $category="<option>Accessories</option>
                                   <option>Art</option>
                                   <option selected='selected'>Books</option>
                                   <option>Clothing</option>
                                   <option>Computers</option>
                                   <option>Electronics</option>
                                   <option>Music</option>
                                   <option>Other</option>";
                    }elseif ($row['type'] === "Clothing"){
                        $category="<option>Accessories</option>
                                   <option>Art</option>
                                   <option>Books</option>
                                   <option selected='selected'>Clothing</option>
                                   <option>Computers</option>
                                   <option>Electronics</option>
                                   <option>Music</option>
                                   <option>Other</option>";
                    }elseif ($row['type'] === "Computers"){
                        $category="<option>Accessories</option>
                                   <option>Art</option>
                                   <option>Books</option>
                                   <option>Clothing</option>
                                   <option selected='selected'>Computers</option>
                                   <option>Electronics</option>
                                   <option>Music</option>
                                   <option>Other</option>";
                    }elseif ($row['type'] === "Electronics") {
                        $category = "<option>Accessories</option>
                                   <option>Art</option>
                                   <option>Books</option>
                                   <option>Clothing</option>
                                   <option>Computers</option>
                                   <option selected='selected'>Electronics</option>
                                   <option>Music</option>
                                   <option>Other</option>";
                    }elseif ($row['type'] === "Music") {
                        $category = "<option>Accessories</option>
                                   <option>Art</option>
                                   <option>Books</option>
                                   <option>Clothing</option>
                                   <option>Computers</option>
                                   <option>Electronics</option>
                                   <option selected='selected'>Music</option>
                                   <option>Other</option>";
                    }else{
                        $category = "<option>Accessories</option>
                                   <option>Art</option>
                                   <option>Books</option>
                                   <option>Clothing</option>
                                   <option>Computers</option>
                                   <option>Electronics</option>
                                   <option>Music</option>
                                   <option selected='selected'>Other</option>";
                    }
                    $card = <<<EOBODY
                        <form action="{$_SERVER["PHP_SELF"]}" method="post">
                            <div class="row col-sm-4 card-format card-text-center">
                                <div class="thumbnail">
                                    $picture
                                    <br>
                                    <p>Click on the values to edit them</p>
                                    <div class="caption">   
                                        <span class="label-text"><strong>Name:</strong></span>
                                        <input type="text" name="name" value="{$row['name']}" class="listing-form">
                                        <br>
                                        <span class="label-text"><strong>Price:</strong></span>
                                        <input type="text" name="price" value="{$row['price']}" class="listing-form">
                                        <br>
                                        <span class="label-text"><strong>Quantity:</strong></span>
                                        <input type="number" class="listing-form" name="quantity" value="{$row['quantity']}" step="1" min="1" placeholder="enter a quantity" required>
                                        <br>
                                        <span class="label-text"><strong>Category</strong></span>
                                            <select class="listing-form" id="sel1" name="category" required>
                                                $category
                                            </select><br>
                                        <span class="label-text"><strong>Description:</strong></span>
                                        <input type="text" name="description" value="{$row['description']}" class="listing-form">
                                        <br>
                                        <strong>Amount sold:</strong> {$row['sold']}</p>
                                        <input type="hidden" name="id" value="{$row['id']}">
                                        <input type="submit" name="submit" class="btn btn-success btn-sm" value="Update Listing">
                                    </div>
                                </div>
                            </div>
                        </form>
EOBODY;
                    $body = $body.$card;
                }
            }
        }
    }

    function sanitize_string($connection, $string) {
        if (get_magic_quotes_gpc()) {
            $string = stripslashes($string);
        }
        return htmlentities($connection->real_escape_string($string));
    }

    $body = $body."</section>";
    /* Freeing memory */
    $result->close();

    /* Closing connection */
    $db_connection->close();

    $page = generatePage($body, "JKAL - Inventory");
    echo $page;
?>
