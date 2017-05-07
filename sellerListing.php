<!--Creates a new listing-->
<?php
    require_once "support.php";

    $message = "";
    if(isset($_POST["submit"])) {
        $extensions= array("jpeg","jpg","png");

        $file_name = $_FILES["image"]['name'];
        $file_tmp = $_FILES["image"]['tmp_name'];
        $file_size = $_FILES["image"]['size'];
        $file_type = $_FILES["image"]['type'];

        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if(in_array($file_ext,$extensions) === false){
            $message = $message."Please choose a JPEG or PNG file.\n";
        }
        if($file_size > 50000000){
            $message = $message."File size must be no bigger than 50 MB\n";
        }

        if($message == "") {
            move_uploaded_file($file_tmp, "upload/" . $file_name);
            $_SESSION['pic'] = $file_tmp;
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['quantity'] = $_POST['quantity'];
            $_SESSION['price'] = $_POST['price'];
            $_SESSION['category'] = $_POST['category'];
            $_SESSION['description'] = $_POST['description'];
            header("Location: listingConfirmation.php");
        }
    }

    $body = <<<EOBODY
        <form action="{$_SERVER["PHP_SELF"]}" enctype="multipart/form-data" method="post">
            <h1>Create a listing:</h1>
            <div class="form-row">
                Select image to upload:
                <input type="file" name="image" id="fileToUpload">
            </div>    
            <div class="col-lg-2 col-lg-offset-5 form-row">
                <span class="label-text">What are you selling?</span>
                <input type="text" name="name" class="form-control" required>
            </div>
            <br>
            <div class="col-lg-2 col-lg-offset-5 form-row">
                <span class="label-text">How many?</span>
                <input type="text" name="quantity" class="form-control" required>
            </div>
            <br>
            <div class="col-lg-2 col-lg-offset-5 form-row">
                <span class="label-text">How much per unit?</span>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" name="price" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="col-lg-2 col-lg-offset-5 form-group form-row">
                <span class="label-text">Category</span>
                <select class="form-control" id="sel1" name="category" required>
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
              <textarea class="form-control" rows="5" name="description" id="comment"></textarea>
              <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Submit Listing">
            </div>
            <br>
        </form>

EOBODY;

    $body = $body.$message;

    $page = generatePage($body, "JKAL- About");
    echo $page;
?>