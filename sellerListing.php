<!--Creates a new listing-->
<?php

    require_once "support.php";

    $css = "<link rel=\"stylesheet\" href=\"css\newListing.css\" />
            ";

    $body = <<<EOBODY
        <div class="form-format">
            <form action="success.php">
                <h1>Create a listing:</h1>
                <span class="label-text">What are you selling?</span>
                <input type="text">
                <br>
                <br>
                <input type="submit">
            </form>
        </div>

EOBODY;



$page = generatePage($body, "JKAL- About");
echo $page;
?>