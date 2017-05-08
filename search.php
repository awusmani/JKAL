<?php
	require_once ("support.php");
	require_once ("accountsDBLogin.php");
	require_once ("getImage.php");

	$body = "<div class='page-header'>
	<h2>Search Results for ".$_POST['searchOption']."</h2>
	</div>";

	$db_connection = new mysqli($host, $user, $password, $database);

	$table="";

	if ($db_connection->connect_error) {
		die($db_connection->connect_error);
	} else { // Successful Connection
			/* Query */
			$query = "select * from items where name='{$_POST['searchOption']}'";

			/* Executing query */
			$result = $db_connection->query($query);

			if (!$result) {
				die("Retrieval failed: ". $db_connection->error);
			} else {
				$result->data_seek(0);
				$row = $result->fetch_array(MYSQLI_ASSOC);

				$table .= "<div class='row' style='margin:0 auto;'>";
				// Item Row
				$image = getImage($row['id']);
				// Create card
				$table .= <<<EOBODY
					<div class="col-md-4">
						<div class="thumbnail">
							$image
							<div class="caption">
								<h3>{$row['name']}</h3>
								<p>Price: \${$row['price']}</p>
								<p>Description: {$row['description']}</p>
								<p>Seller: {$row['username']}</p>
								<p>Quantity: {$row['quantity']}</p>
								<p>
									<button class="btn btn-default btn-sm"><i class="fa fa-gift fa-lg"></i> Add to Wish List</button>
									<button class="btn btn-default btn-sm" onclick="request_access(this)" id="{$row['id']}"><i class="fa fa-cart-plus fa-lg"></i> Add to Cart</button>
								</p>
							</div>
						</div>
					</div>
EOBODY;
				$table .= "</div>";
			}




	/* Closing connection */
	$db_connection->close();

	}
		$body .= $table;
		$body .= "<br /><hr /><br /><a class='btn btn-lg btn-primary' href='#'>
		<i class='fa fa-shopping-basket' aria-hidden='true'></i> Checkout</a>";

	$page = generatePage($body, "JKAL- Search Results: {$_POST['searchOption']}");
	echo $page;


?>
