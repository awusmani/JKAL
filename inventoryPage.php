<?php
    require_once "support.php";

    $body = <<<EOBODY
        
EOBODY;

    $page = generatePage($body, "Listing Confirmation");
    echo $page;
?>