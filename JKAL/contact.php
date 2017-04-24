<?php
	
	require_once "support.php";

	
	$body = <<<EOBODY

	<div id = "logoContact">
		<img src="images\JKAL_logo.png">
	</div>

	<form action = "contactSubmit.php" method="post" id= "contact">

		<input type= "text" name= "firstName" placeholder= "first name" required>
		<input type= "text" name= "lastName" placeholder= "last name" required>
		</br></br>
		<input type= "email" name= "email" placeholder= "email" required>
		</br></br>
		message
		</br>
		<textarea rows="4" cols="46" name = "comments"></textarea>
		</br>
		<input type= "submit" name= "send" value= "send">

	</form>

	


EOBODY;


$page = generatePage($body, "J K A L");
echo $page;


?>