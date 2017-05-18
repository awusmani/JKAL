<?php


	session_start();
	//die("test");
	if(isset($_SESSION['cartlist'])){

		$newArray = array();
		$deleted = false;
		foreach($_SESSION['cartlist'] as $key=>$value){
			if($value == $_POST['lang'] && $deleted == false){
				$deleted = true;
			}else{
				array_push($newArray, $value);
			}

		}


		$_SESSION['cartlist'] = $newArray;


		

		//die();

		$_SESSION['cartCount']--;
		

		die("removed from cart");
	}



?>