<?php

	require_once "support.php";


	$body = <<<EOBODY


	<div>
		<div class="page-header">
		<h2>About Us</h2>
		</div>
			<p class="text-section">
				JKAL (pronounced Jackal) is an online web store where people can quickly put up items to sell.
				Imagine you want to clean out your closet or storage and want to put those items up for sale.
				We make it easy for you host your own local store on here.
			</p>
	</div>

	<div class="page-header">
	<h2>Meet the People</h2>
	</div>
	<section class="contributors">
		<div class="row">
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="images/justin.jpg" alt="Justin">
		      <div class="caption">
		        <h3>Justin Chan</h3>
		        <p>...</p>
		      </div>
		    </div>
		  </div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="images/kevin.jpg" alt="Kevin">
					<div class="caption">
						<h3>Kevin Woo</h3>
						<p>...</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="images/abdul.jpg" alt="Abdul">
					<div class="caption">
						<h3>Abdul Usmani</h3>
						<p>...</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="images/lihan.jpg" alt="Lihan">
					<div class="caption">
						<h3>Lihan Zhang</h3>
						<p>...</p>
					</div>
				</div>
			</div>
		</div>
	</section>

EOBODY;


$page = generatePage($body, "JKAL- About");
echo $page;


?>
