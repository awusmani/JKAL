<?php


	session_start();
	//die("test");
	if(isset($_SESSION['cartlist'])){

		$_SESSION['cartlist'][] = $_POST['lang'];

		if(($key = array_search($_POST['lang'], $arr)) !== false) {
		    unset($arr[$key]);
		}

		$_SESSION['cartCount']--;
		

		die("removed from cart");
	}



?>