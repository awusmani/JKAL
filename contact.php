<?php

	require_once "support.php";


	$body = <<<EOBODY

<div class="page-header">
<h2>Contact Us</h2>
</div>
	<div id= "contact">
		<form action = "contactSubmit.php" method="post">

			<input type= "text" name= "firstName" placeholder= "first name" required>
			<input type= "text" name= "lastName" placeholder= "last name" required>
			</br></br>
			<input type= "email" name= "email" placeholder= "email" required>
			</br></br>
			message
			</br>
			<textarea wrap="hard" rows="4" cols="46" name = "comments"></textarea>
			</br>
			<input type= "submit" name= "send" value= "send">

		</form>
	</div>




EOBODY;


$page = generatePage($body, "JKAL- Contact");
echo $page;


?>
