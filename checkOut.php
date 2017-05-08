<?php
    require_once "support.php";
    require_once ("decrementItem.php");

    $arr = [];

    $body = "<h1>Items have been checked out!</h1><br />";
    $body .= "<hr><h2>Total Cost</h2>";
    $total = 0;
    for ($index = 0; $index < sizeof($_SESSION['checkout']); $index++) {
        $id = $_SESSION['cartlist'][$index];
        decrementItem($id);
        $price = $_SESSION['checkout'][$index];
        $total = number_format($total + $price, 2);
    }

    $_SESSION['cartCount'] = 0;
    $_SESSION['cartlist'] = $arr;

    $body .= "<strong>".$total."</strong><br />";

    $page = generatePage($body, "JKAL- Cart");
	echo $page;
?>