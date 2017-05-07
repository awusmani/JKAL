<?php
session_start();
function generatePage($body, $title) {
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
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
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
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Store<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="storeMain.php">Main</a></li>
                  <li><a href="#">Page 1-2</a></li>
                  <li><a href="#">Page 1-3</a></li>
                </ul>
              </li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left">
                <div class="search">
                    <!-- autocomplete feature? -->
                    <input type="text" autocomplete="off" placeholder="Search for item...">
                    <div class="result"></div>
                </div>
                </form>
              <li><a href="signUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </nav>

    <div class="nav-container">$body</div>

    </body>
</html>
EOPAGE;

    return $page;
}
?>
