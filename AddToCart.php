<?php


	session_start();
	//die("test");
	if(isset($_SESSION['cartlist'])){

		$_SESSION['cartlist'][] = $_POST['lang'];
		$_SESSION['cartCount']++;
		

		die("added to cart");
	}



?>