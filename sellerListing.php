<!--Creates a new listing-->
<?php

    require_once "support.php";

    $body = <<<EOBODY
        <form action="success.php">
            <h1>Create a listing:</h1>
            <div class="col-lg-2 col-lg-offset-5 form-row">
                <span class="label-text">What are you selling?</span>
                <input type="text" name="name" class="form-control">
            </div>
            <br>
            <div class="col-lg-2 col-lg-offset-5 form-row">
                <span class="label-text">How many?</span>
                <input type="text" name="quantity" class="form-control">
            </div>
            <br>
            <div class="col-lg-2 col-lg-offset-5 form-row">
                <span class="label-text">How much per unit?</span>
                <div class="input-group">
                  <span class="input-group-addon">$</span>
                  <input type="text" name="price" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="radio">
                  <label><input type="radio" name="optradio">Option 1</label><br>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio">Option 2</label><br>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio">Option 3</label>
                </div>
            </div>
            <div class="col-lg-4 col-lg-offset-4">
                <div class="form-group">
                  <label for="comment">Comment:</label>
                  <textarea class="form-control" rows="5" name="description" id="comment"></textarea>
                </div>
                <input type="submit" class="btn btn-primary btn-sm" value="Submit Listing">
            </div>
            <br>
        </form>

EOBODY;



$page = generatePage($body, "JKAL- About");
echo $page;
?>