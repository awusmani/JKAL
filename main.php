<?php
  session_start();
	$page = <<<EOBODY
	<html>
	    <head>
	        <meta charset="utf-8" />
	        <title>JKAL</title>

					<script src="js/jquery-3.2.1.min.js"></script>
					<!-- Latest compiled and minified CSS -->
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

					<!-- Optional theme -->
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

					<!-- Latest compiled and minified JavaScript -->
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

					<link rel="stylesheet" href="css\main.css" />
					<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
					<script src="https://use.fontawesome.com/f7f9767f2d.js"></script>

			<script>
			$(document).ready(function(){

				/*! Fades in page on load */
				$('body').css('display', 'none');
				$('body').fadeIn(500);

			});
			</script>

			</head>

	    <body id="mainpage" class="mainpage">

				<div id="loader"></div>

				<div class="animate-bottom">

					<img src="images\JKAL_logo.png" class ="mainLogo" width="40%">
					<!-- <a href="main.php"><h1 class ="mainLogo" >LOGO IMAGE HERE</h1></a> -->
					<ul class="mainLinks">
						<li><a href="storeMain.php">Store</a></li>
						<li>
							<a href="#aboutText" id="about" data-toggle="collapse">About</a>
							<div id="aboutText" class="collapse" style="text-align:center; width:50em; margin:0 auto;">
							JKAL is a CMSC389N Project made by Justin Kevin Abdul and Lihan. Add more shit here ya knuh 100 100 turn up for the SQUAAA bape x supreme yeezys we out here fam gang gang caravaggio
						  </div>
						</li>
						<li><a href="contact.php">Contact</a></li>
					</ul>

					<div class="footer">
						<ul>
							<li><a href="https://www.facebook.com/nelson.paduaperez"><i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a></li>
							<li><a href="https://github.com/justinhchan/JKAL"><i class="fa fa-github fa-lg" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<div class="clearfix">

					</div>
				</div>
	    </body>
	</html>
EOBODY;


	echo $page;
?>
