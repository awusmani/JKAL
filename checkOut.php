<?php
    require_once "support.php";
    require_once ("decrementItem.php");

    $arr = [];

    $body = "<div class='page-header'>
    <h2>Checkout</h2>
    </div>
    <h3>Items have been checked out!</h3>";
    $body .= "<h4>Total Cost</h4>";
    $total = 0;
    for ($index = 0; $index < sizeof($_SESSION['checkout']); $index++) {
        $id = $_SESSION['cartlist'][$index];
        decrementItem($id);
        $price = $_SESSION['checkout'][$index];
        $total = number_format($total + $price, 2);
    }

    $_SESSION['cartCount'] = 0;
    $_SESSION['cartlist'] = $arr;

    $body .= "<strong>\$".$total."</strong><br />";

    $page = generatePage($body, "JKAL- Checkout");
	echo $page;
?>
