<!--Creates a new listing-->
<?php
    require_once "support.php";

    $message = "";

    $name = "";
    $name = "";
    $quantity = "";
    $price = "";
    $category = "";
    $description = "";

    if(isset($_POST["submit"])) {
        $extensions= array("jpeg","jpg","png");

        $file_name = $_FILES["image"]['name'];
        $file_tmp = $_FILES["image"]['tmp_name'];
        $file_size = $_FILES["image"]['size'];
        $file_type = $_FILES["image"]['type'];

        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $description = $_POST['description'];

        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if(in_array($file_ext,$extensions) === false){
            $message = $message."Please choose a JPEG or PNG file.\n";
        }
        if($file_size > 50000000){
            $message = $message."File size must be no bigger than 50 MB.\n";
        }

        if($message == "") {
            move_uploaded_file($file_tmp, "upload/" . $file_name);
            $_SESSION['pic'] = $file_tmp;
            $_SESSION['name'] = $name;
            $_SESSION['quantity'] = $quantity;
            $_SESSION['price'] = $price;
            $_SESSION['category'] = $category;
            $_SESSION['description'] = $description;
            header("Location: listingConfirmation.php");
        }
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
                <input type="file" name="image" id="fileToUpload" required>
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