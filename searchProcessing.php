<?php
    declare(strict_types=1);
	require_once "accountsDBLogin.php";

    $database = new mysqli($host, $user, $password, $database);
	if ($database->connect_error) {
		die($database->connect_error);
	}

    $word = mysqli_real_escape_string($database, $_REQUEST['keyword']);

    if(isset($word)) {
        $query = "select * from items where name like '".$word."%'";
        $result = $database->query($query);
	    if (!$result) {
		    die("Query failed: " . $database->error);
	    } else {
            $num_rows = $result->num_rows;
            if ($num_rows > 0) {
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    // return matches
                    echo "<p>".$row["name"]."</p>";
                }
                $result->free();
            } else {
                // 0 matches 
            }
        }
    }   

    $database->close();
?>