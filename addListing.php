<?php
    require_once("support.php"); 

    $bottomPart <<< EOBODY
    <form action="listingConfirmation.php" method="post">
        hello
    </form>
EOBODY;

    $body = $bottomPart;
    $page = generatePage($body,"Add Listing");
    echo $page;
?>