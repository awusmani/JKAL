<!--Creates a new listing-->
<?php
    require_once "support.php";
	require_once "accountsDBLogin.php";

    $message = "";

    $name = "";
    $name = "";
    $quantity = "";
    $price = "";
    $category = "";
    $description = "";

    if(isset($_POST["submit"])) {
        $extensions= array("jpeg", "jpg", "png");
        $file_name = $_FILES["userimage"]['name'];
        $file_size = $_FILES["userimage"]['size'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if ($file_size > 5242880) {
            echo '<p>File size must be no bigger than 5 MB.<p><br />';
        }
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if (in_array($file_ext,$extensions) === true) {
            $img = addslashes(file_get_contents($_FILES['userimage']['tmp_name']));
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $database = new mysqli($host, $user, $password, $database);
	            
            if ($database->connect_error) {
	            die($database->connect_error);
	        }

            $_SESSION['name'] = $name;
            $_SESSION['quantity'] = $quantity;
            $_SESSION['price'] = $price;
            $_SESSION['category'] = $category;
            $_SESSION['description'] = $description;
            
            $sPrice = sanitize_string($database, trim($price));
            $sName = sanitize_string($database, trim($name));
            $sType = $category;
            $sDsrt = sanitize_string($database, trim($description));
            $sUser = $_SESSION['username'];
            $sQnty = $quantity;
            $sSold = 0;
            
            $query = "insert into items (price, name, type, description, username, quantity, sold) values ('$sPrice', '$sName', '$sType', '$sDsrt', '$sUser', '$sQnty', '$sSold')";

            $result = $database->query($query);
            if (!$result) {
                die("Insertion failed: " . $database->error);
            } else {
                $last_id = $database->insert_id;
                    
                $query2 = "insert into images values ('$last_id','$img','','')";

                $result2 = $database->query($query2);
                if (!$result2) {
                    die("Insertion failed: " . $database->error);
                }
                $_SESSION['lastid'] = $last_id;
            }
            $database->close();
            header("Location: listingConfirmation.php");
        } else {
            echo '<p>Please choose a JPEG or PNG file.<p><br />';
        }
    }

    function sanitize_string($db_connection, $string) {
        if (get_magic_quotes_gpc()) { 
            $string = stripslashes($string); 
        } 
        return htmlentities($db_connection->real_escape_string($string)); 
    }

    $body = <<<EOBODY
        <form action="{$_SERVER["PHP_SELF"]}" enctype="multipart/form-data" method="post">
            <h1>Create a new listing:</h1>
            <div class="col-lg-2 col-lg-offset-5 form-row">
                <span class="label-text">What are you selling?</span>
                <input type="text" class="listing-form" name="name" value="{$name}" placeholder="e.g. Yeezys" required>
            </div>
            <div class="col-lg-2 col-lg-offset-5 form-row">
                What does it look like?
                <input type="file" name="userimage" id="fileToUpload" required>
            </div>
            <br>
            <div class="col-lg-2 col-lg-offset-5 form-row">
                <span class="label-text">How many?</span>
                <input type="text" class="listing-form" name="quantity" value="{$quantity}" placeholder="enter a quantity" required>
            </div>
            <br>
            <div class="col-lg-2 col-lg-offset-5 form-row">
                <span class="label-text">How much per unit?</span>
                <input type="text" class="listing-form" name="price" value="{$price}" placeholder="in whole $" required>
            </div>
            <br>
            <div class="col-lg-2 col-lg-offset-5 form-group form-row">
                <span class="label-text">Category</span>
                <select class="listing-form" id="sel1" name="category" required>
                    <option>Accessories</option>
                    <option>Art</option>
                    <option>Books</option>
                    <option>Clothing</option>
                    <option>Computers</option>
                    <option>Electronics</option>
                    <option>Music</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="col-lg-4 col-lg-offset-4 form-group form-row">
              <span class="label-text">Anything else you want to say about it:</span>
              <textarea class="listing-form description" rows="1" cols="50" name="description" placeholder="condition, rarity, etc.">$description</textarea>
            </div>
            <div class="col-lg-4 col-lg-offset-4 form-group form-row">
                <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Submit Listing">
            </div>
            <br>
        </form>
        <div class="col-lg-4 col-lg-offset-4 error-text">
            $message
        </div>

EOBODY;

    $page = generatePage($body, "JKAL- About");
    echo $page;
?>