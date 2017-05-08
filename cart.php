<?php
	require_once "support.php";
	require_once("accountsDBLogin.php");
	require_once("getImage.php");

	if (!isset($_SESSION['username'])) {
		header('Location: Login.php');
	}

	// $_SESSION['cartlist'] = [];
	//  $_SESSION['cartlist'] = ['24','19','16'];

	$body = "<div class='page-header'>
	<h2>Your Cart</h2>
	</div>";

	if (sizeof($_SESSION['cartlist']) === 0) {
		$body .= "<h3 class='error'>Your cart is empty.</h3>";
	} else {
		$db_connection = new mysqli($host, $user, $password, $database);

	  $table="";

	  if ($db_connection->connect_error) {
	    die($db_connection->connect_error);
	  } else { // Successful Connection

			$table .= "<div class='row' style='margin:0 auto;width:80%;'>";
			// For each cart item
			$row_index = 0;
			for ($row_index; $row_index < count($_SESSION['cartlist']); $row_index++) {
				$currentId = $_SESSION['cartlist'][$row_index];

				/* Query */
				$query = "select * from items where id='{$currentId}'";

				/* Executing query */
				$result = $db_connection->query($query);

				if (!$result) {
		      die("Retrieval failed: ". $db_connection->error);
		    } else {
					$result->data_seek(0);
  				$row = $result->fetch_array(MYSQLI_ASSOC);
					// Item Row
					$image = getImage($currentId);
					// Create card
					$table .= <<<EOBODY
						<div class="col-sm-4">
							<div class="thumbnail">
								$image
								<div class="caption">
									<h3>{$row['name']}</h3>
									<p>Price: \${$row['price']}</p>
									<p>Description: {$row['description']}</p>
									<p>Seller: {$row['username']}</p>
									<p>
										<button class="btn btn-danger btn-sm" onclick="request_access2(this)" id="{$row['id']}"><i class="fa fa-times fa-lg"></i> Remove from cart</button>
									</p>

								</div>
							</div>
						</div>
EOBODY;
		    }
			} // End cartlist forloop
			$table .= "</div>";

	  /* Closing connection */
	  $db_connection->close();

	  }
			$body .= $table;
			$body .= "<br /><hr /><br /><a class='btn btn-lg btn-primary' href='#'>
			<i class='fa fa-shopping-basket' aria-hidden='true'></i> Checkout</a>";
	}

	$page = generatePage($body, "JKAL- Cart");
	echo $page;
?>
