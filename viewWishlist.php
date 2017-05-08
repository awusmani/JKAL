<?php
 function viewWishlist($id,$arr) {
    $host = "localhost";
    $user = "csuser";
    $password = "helloworld";
    $database = "shopdb";

    $body = ""
    for($i = 0; $i < count($arr); $i++) {
	    $id = $arr[$i];

		$query = "select * from items where id='$id[0]'";

		$result = $database->query($query);
		if (!$result) {
			die("Query failed: " . $database->error);
		} else {
			$num_rows = $result->num_rows;
			if($num_rows === 0) {
			    die("No entry exists ". $database->error);
			} else {
				for($x = 0; $x < $num_rows-1; $x++) {
					$result->data_seek($x);
					$row = $result2->fetch_array(MYSQLI_ASSOC);
					$body .= "<p>".$row["name"]."</p><br />";
				}
			}
		}
	}	
    return $body;
}
    
?>