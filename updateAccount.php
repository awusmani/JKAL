<?php
  require_once("support.php");
  require_once("accountsDBLogin.php");

  // Validation
  $body = "<div class='page-header'><h2>Update Account Information</h2></div>";
  $body .= <<<EOBODY
    <form action="{$_SERVER['PHP_SELF']}" method="post">
    <input type="text" name="username" placeholder="Username" autofocus required/>
    <br /><br />
    <input type="password" name="password" placeholder="Password" required/>
    <br /><br />

    <input type="submit" name="submitButton" value="Submit"/><br /><br />
    </form>
EOBODY;

  if (isset($_POST["submitButton"])) {
    $db_connection = new mysqli($host, $user, $password, $database);
    if ($db_connection->connect_error) {
      die($db_connection->connect_error);
    } else { // Successful Connection
      /* Query */
      $query = "select * from accounts where username='".$_POST['username']."'";

      /* Executing query */
      $result = $db_connection->query($query);
      if (!$result) {
        die("Retrieval failed: ". $db_connection->error);
      } else {
        /* Number of rows found */
        $num_rows = $result->num_rows;
        if ($num_rows === 0) {
          $body .=  "<h3 class='error'>Username does not exist.</h3>";
        } else {
          // Found row(s)
          $result->data_seek(0);
          $row = $result->fetch_array(MYSQLI_ASSOC);

          if (password_verify($_POST['password'], $row['password'])) {
            // Correct password

            $body = "<div class='page-header'><h2>Update Account Information</h2></div>
            <form action='update.php' method='post'>
            <input type='hidden' name='username' value='".$_POST['username']."'/>
            <strong>Frist Name:</strong><input type='text' name='firstname' value={$row['firstname']} autofocus required/>
            <br /><br />
            <strong>Last Name:</strong><input type='text' name='lastname' value={$row['lastname']} autofocus required/>
            <br /><br />
            <strong>Email:</strong><input type='email' name='email' value ={$row['email']} required/>
            <br /><br />";

            $body .= "<strong>Password: </strong><input type='password' name='password' value='".$_POST['password']."' required/>
            <br /><br />
            <strong>Verify Password: </strong><input type='password' name='password2' value='".$_POST['password']."' required/>
            <br /><br />";

            $body.= "<input type='submit' name='submitButton' value='Submit Data'/><br /><br />
            </form>";

          } else {
            $body .= "<h3 class='error'>Incorrect password.</h3>";
          }
          /* Freeing memory */
          $result->close();
        }
      }
    }

    /* Closing connection */
    $db_connection->close();

  }

  $page = generatePage($body,"JKAL - Edit Account");
  echo $page;
?>
