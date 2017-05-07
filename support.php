<?php

function generatePage($body, $title) {
    $page = <<<EOPAGE
<!doctype html>
<html>
    <head> 
        <meta charset="utf-8" />
        <title>$title</title>

		<link rel="stylesheet" href="css\style.css" />
        <link rel="stylesheet" href="css\signUpLogin.css" />

    </head>
            
    <body>
            $body

            <footer>

                <div class= "footerLinks">

                    <a href="main.php">Home</a>
                    <a href="storeMain.php">Store</a>
                    <a href="about.php">About</a>
                    <a href="contact.php">Contact</a>

                    <span class= "copyright">
                        &copy; JKAL
                    </span>

                </div>


            </footer>

    </body>
</html>
EOPAGE;

    return $page;
}
?>