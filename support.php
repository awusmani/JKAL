<?php
session_start();
function generatePage($body, $title) {
    $page = <<<EOPAGE
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>$title</title>

        <link rel="stylesheet" href="css\support.css" />
        <link rel="stylesheet" href="css\signUpLogin.css" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    </head>

    <body>
      $body
      <footer>
          <div class= "footer">
              <a href="main.php">Home</a>
              <a href="storeMain.php">Store</a>
              <a href="about.php">About</a>
              <a href="contact.php">Contact</a>
              <span class= "copyright">&copy; 2017</span>
          </div>
      </footer>
    </body>
</html>
EOPAGE;

    return $page;
}
?>
