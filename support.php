<?php
session_start();

function generatePage($body, $title) {
    if (isset($_SESSION['username'])) {
        $rightSide = <<<EOPAGE
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-lg" aria-hidden="true"></i> {$_SESSION["username"]}<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="updateAccount.php"><i class="fa fa-pencil fa-lg"></i> Edit Account</a></li>
            <li><a href="inventoryPage.php"><i class="fa fa-archive fa-lg" aria-hidden="true"></i> Inventory</a></li>
            <li><a href="sellerListing.php"><i class="fa fa-plus" aria-hidden="true"></i> New Listing</a></li>
            <li class="divider"></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>

        <li class="active"><a href="cart.php"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>&nbsp;<span class="badge">{$_SESSION['cartCount']}</span></a></li>
EOPAGE;
    } else {
        $rightSide = <<<EOPAGE
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="signUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
EOPAGE;
    }

    $page = <<<EOPAGE
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>$title</title>

        <script src="js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="css\support.css" />
        <link rel="stylesheet" href="css\store.css" />
        <link rel="stylesheet" href="css\signUpLogin.css" />
        <link rel="stylesheet" href="css\about.css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

        <link rel="stylesheet" href="css\style.css" />
        <link rel="stylesheet" href="css\sellerListing.css" />
        <link rel="stylesheet" href="css\signUpLogin.css" />
        <script src="https://use.fontawesome.com/f7f9767f2d.js"></script>
        <script src="js/searchSkeleton.js"></script>
    </head>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top navbar-static-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <a href="main.php"><img src="images/JKAL_logo.png" class="navbar-brand"/></a>
            </div>
            <ul class="nav navbar-nav">
              <li><a href="storeMain.php">Store</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left" method="post" action="search.php">
                    <div class="searchbox">
                        <input type="text" name="searchOption" autocomplete="off" placeholder="Search for item..." />
                        <div class="result" width="200"></div>
                    </div>
                </form>
                $rightSide
            </ul>
          </div>
        </nav>

    <div class="nav-container">
    <img src="images\JKAL_Logo.png" class="img-logo">
    $body
    </div>
    <script src='js/cartScript.js'></script>
    <script src='js/removeCart.js'></script>
    </body>
</html>
EOPAGE;

    return $page;
}
?>
