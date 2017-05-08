<?php
	require_once "support.php";
  require_once "getItems.php";

	$body = <<<EOBODY

  <script>
    $(document).ready(function() {
      $('#myCarousel').carousel({interval: 2500});
    });
  </script>

  <!-- Carousel -->
  <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin:0 auto; width:100%;">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="images/stock1.jpg" alt="Slide 1" style="width:100%;">
        </div>

        <div class="item">
          <img src="images/stock2.jpg" alt="Slide 2" style="width:100%;">
        </div>

        <div class="item">
          <img src="images/stock3.jpg" alt="Slide 3" style="width:100%;">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <br />
  <!-- End carousel -->

	<div class="page-header">
	<h2>View All</h2>
	</div>
EOBODY;

/* Display All Items */
$body .= getItems();
$body .= "<script src='js/cartScript.js'></script>";


$page = generatePage($body, "JKAL- Store");
echo $page;
?>
