<?php
	require_once "support.php";

	$body = <<<EOBODY

  <script>
    $(document).ready(function() {
      $('#myCarousel').carousel({interval: 2500});
    });
  </script>

  <!-- Carousel -->
  <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin:0 auto; width:80%;">
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
  <!-- End carousel -->

  <p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquet varius sapien in viverra. Nullam vitae ante vitae sapien auctor suscipit. Donec volutpat ante orci, ac finibus neque sollicitudin sed. Aenean sapien quam, pretium nec varius sed, faucibus id arcu. Praesent nibh leo, dictum vitae elit quis, luctus condimentum diam. Cras eu felis sed ante porta faucibus. Etiam fermentum, dolor ut efficitur mattis, ex metus commodo quam, at faucibus nisi ipsum ac augue. Duis vestibulum justo metus. Pellentesque vitae felis sed risus posuere ornare.
  <br /><br />
  Aenean magna urna, scelerisque ut convallis id, semper nec mauris. In lorem diam, dictum vitae lobortis id, consectetur maximus orci. In nibh magna, sodales vitae elementum quis, gravida a lorem. Nullam ut nunc et dui ultricies dictum. Fusce dictum arcu sed massa consequat finibus. Duis sit amet ante in tortor faucibus scelerisque. Integer laoreet ligula in laoreet euismod. Integer varius lacus porttitor mi maximus bibendum. Cras interdum justo elementum orci luctus eleifend. Sed hendrerit a lectus mollis ullamcorper. Praesent hendrerit tristique finibus. Pellentesque tincidunt maximus ligula vel posuere. Maecenas tempus enim turpis, lacinia dignissim enim fermentum sed.
  <br /><br />
  Quisque libero augue, venenatis at auctor at, consequat nec dui. Fusce eget malesuada augue. Pellentesque eu risus sed dui consequat volutpat. Morbi efficitur nunc vitae nibh viverra vehicula. Nulla eu efficitur risus. Sed bibendum ipsum at purus vulputate luctus. Integer interdum feugiat maximus. Nullam magna nibh, efficitur eu vestibulum eget, tincidunt sed metus. Mauris viverra, tellus sit amet facilisis mollis, magna lectus laoreet metus, vel scelerisque odio arcu vitae eros. Aliquam quis velit et tortor porta tempor non nec dui. Maecenas nec arcu tempor, hendrerit felis quis, egestas dolor. Quisque sem felis, sodales id sodales quis, finibus at tellus. Maecenas gravida elit nulla, accumsan bibendum magna viverra venenatis. Sed ultrices lectus turpis, vitae scelerisque massa efficitur eu. Vivamus ipsum magna, consectetur vitae tortor vel, tempus rutrum dui. Sed non porttitor libero.
  <br /><br />
  Quisque eget dolor sed enim convallis auctor non a odio. Cras quam turpis, viverra eu ipsum et, aliquet semper sem. In velit nibh, mollis in blandit eget, mattis a eros. Donec lacinia vel est id maximus. Morbi bibendum, lorem nec tempor consequat, neque eros sollicitudin tellus, eu egestas metus turpis sit amet dui. Nullam hendrerit elit a consectetur sollicitudin. Phasellus pharetra dapibus mi, id convallis erat consequat ut. Mauris molestie tortor eu lectus hendrerit, dictum cursus enim aliquet. Etiam placerat orci sit amet imperdiet facilisis. Suspendisse non placerat quam. Fusce rhoncus diam justo, non ultricies lacus suscipit sed. Aenean id mollis tortor. Maecenas gravida ac magna vel lacinia.
  <br /><br />
  Placerat lorem vitae nunc blandit consequat. Etiam finibus volutpat urna nec rutrum. Curabitur sit amet quam quam. Aenean rutrum orci id odio tempus consectetur. Proin porttitor vel velit a malesuada. Vivamus cursus lobortis arcu ut bibendum. Aenean enim neque, sagittis in lobortis vitae, laoreet nec risus. Integer libero orci, rhoncus vel urna id, porta efficitur diam.
  </p>



EOBODY;


$page = generatePage($body, "JKAL- Store");
echo $page;
?>
