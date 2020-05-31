<?php


// Start the session
session_start();
$uname = $_SESSION["name"];
//echo $uname;

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "test"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>User-Page Emotrack</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  
 
  

	<div id="colorlib-page">
		<a href="index.php" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo"><a href="index.php">
			

			<?php
			$r=mysqli_query($con,"SELECT img FROM user WHERE name = '$uname' ");
			while($row=mysqli_fetch_array($r))
			{
			echo '<span class="img" style="background-image: url(data:image/png;base64,'.base64_encode($row['img']).');"></span>';
			}
			?>	
		
			
			<!--<span class="img" style="background-image: url(images/author.jpg);">
			</span>-->
			<?php
			echo $uname;
			?>
			
			
			</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li class="colorlib-active"><a href="index.php">Home</a></li>
					<li><a href="editprofile.php">Edit Profile</a></li>
					<li><a href=" services.php">Analyse</a></li>
					<li><a href="logout.php">Logout</a></li>
					
				</ul>
			</nav>

			<div class="colorlib-footer">
				<h3>Newsletter</h3>
				<div class="d-flex justify-content-center">
					<form action="#" class="colorlib-subscribe-form">
            <div class="form-group d-flex">
            	<div class="icon"><span class="icon-paper-plane"></span></div>
              <input type="text" class="form-control" placeholder="Enter Email Address">
            </div>
          </form>
				</div>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section-no-padding bg-light">
				<div class="hero-wrap">
					<div class="overlay"></div>
					<div class="d-flex align-items-center js-fullheight">
						<div class="author-image text img d-flex">
							<section class="home-slider js-fullheight owl-carousel">
							
							<div class="slider-item js-fullheight" style=" margin:4px, 4px;padding:4px; width: 510px; height: 658px; overflow-x: hidden; overflow-x: auto; text-align:justify ">
							
							
									<a class="twitter-timeline" data-theme="dark" href="https://twitter.com/ScienceNews?ref_src=twsrc%5Etfw">Tweets by ScienceNews</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
 
							</div>
 
							<div class="slider-item js-fullheight" style=" margin:4px, 4px;padding:4px; width: 510px; height: 658px; overflow-x: hidden; overflow-x: auto; text-align:justify ">
 
									<a class="twitter-timeline" data-theme="dark" href="https://twitter.com/technewsworld?ref_src=twsrc%5Etfw">Tweets by technewsworld</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
 
							</div>	

							<div class="slider-item js-fullheight" style=" margin:4px, 4px;padding:4px; width: 510px; height: 658px; overflow-x: hidden; overflow-x: auto; text-align:justify ">
 

									<a class="twitter-timeline" data-theme="dark" href="https://twitter.com/technews_today?ref_src=twsrc%5Etfw">Tweets by technews_today</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
							
							</div>
							
					     <!--  <div class="slider-item js-fullheight" style="background-image: url(images/author.jpg);">
					      </div> -->

					     <!--  <div class="slider-item js-fullheight" style="background-image:url(images/author-2.jpg);">
					      </div> -->
					    </section>
						</div>
						<div class="author-info text p-3 p-md-5">
							<div class="desc">
								<span class="subheading">Hello! Folks</span>
								<h1 class="big-letter">Emo Track</h1>
								<h1 class="mb-4"><span>Emo Track</span> Our Team <span>We Help You Select | Review | Analyse</span></h1>
								<p class="mb-4">This is our team from Christ University, developing a web application for easier tweet analysis, we make sentiment analysis easier & simple regarding various topics based on tweets.</p>
								<h3 class="signature h1">Emo Track</h3>
								<ul class="ftco-social mt-3">
		              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		            </ul>
	            </div>
						</div>
					</div>
				</div>
			</section>
			
	    <footer class="ftco-footer ftco-bg-dark ftco-section">
	      <div class="container px-md-5">
	        <div class="row mb-5">
	          <div class="col-md">
	            <div class="ftco-footer-widget mb-4">
	              <h2 class="ftco-heading-2">Recent Search</h2>
	              <ul class="list-unstyled categories">
	                <!-- <li><a href="#" class="img" style="background-image: url(images/image_1.jpg);"></a></li>
	                <li><a href="#" class="img" style="background-image: url(images/image_2.jpg);"></a></li>
	                <li><a href="#" class="img" style="background-image: url(images/image_3.jpg);"></a></li>
	                <li><a href="#" class="img" style="background-image: url(images/image_4.jpg);"></a></li>
	                <li><a href="#" class="img" style="background-image: url(images/image_5.jpg);"></a></li>
	                <li><a href="#" class="img" style="background-image: url(images/image_6.jpg);"></a></li> -->
					<li><a href="#">Christ University </a></li>
	              	<li><a href="#">Zomato </a></li>
	                <li><a href="#">DQ </a></li>
	                <li><a href="#">Narendra Modi </a></li>
	                <li><a href="#">Dark Web </a></li>
	              </ul>
	            </div>
	          </div>
	          <div class="col-md">
	             <div class="ftco-footer-widget mb-4">
	              <h2 class="ftco-heading-2">Hit Rate</h2>
				  
				  
				  <?php
			$r=mysqli_query($con,"SELECT * FROM hitrate ORDER BY count DESC");
			while($row=mysqli_fetch_array($r))
			{
			echo '<ul class="list-unstyled categories">';
			echo '<li><a href="#">';echo $row[0]; echo '<span>'; echo $row[1]; echo'</span></a></li>';
			//echo '<span class="img" style="background-image: url(data:image/png;base64,'.base64_encode($row['img']).');"></span>';
			}
			?>	
				  
				  
	              
	              </ul>
	            </div>
	          </div>
	          <div class="col-md">
	            <div class="ftco-footer-widget mb-4">
	            	<h2 class="ftco-heading-2">Have a Questions?</h2>
	            	<div class="block-23 mb-3">
		              <ul>
		                <li><span class="icon icon-map-marker"></span><span class="text"> 5 MCA, 8th floor, Central Block, Christ University</span></li>
		                <li><a href="#"><span class="icon icon-phone"></span><span class="text"> +91 8971585410</span></a></li>
		                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"> contact@abm.com</span></a></li>
		              </ul>
		            </div>
	            </div>
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-md-12">

	            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <strong> ABM & CO</strong> | Made with <i class="icon-heart" aria-hidden="true"></i> by <a href="#" target="_blank">ABM & CO</a>
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	          </div>
	        </div>
	      </div>
	    </footer>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>