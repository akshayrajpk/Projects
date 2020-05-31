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
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo"><a href="index.php">
			
			<?php
			$r=mysqli_query($con,"SELECT img FROM user WHERE name = '$uname' ");
			while($row=mysqli_fetch_array($r))
			{
			echo '<span class="img" style="background-image: url(data:image/png;base64,'.base64_encode($row['img']).');"></span>';
			}
			?>	
		
			
			<?php
			echo $uname;
			?>
			
			</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li class="colorlib-active"><a href="editprofile.php">Edit Profile</a></li>
					<li><a href=" services.php">Analyse</a></li>
					<li><a href="logout.php">Logout</a></li>
					
				</ul>
			</nav>

			
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-bread">
				<div class="container">
					<div class="row no-gutters slider-text justify-content-center align-items-center">
	          <div class="col-md-8 ftco-animate">
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Edit Profile</span></p>
	            <h1 class="bread">Welcome &nbsp;  <?php	echo $uname; ?></h1>
	          </div>
	        </div>
				</div>
			</section>
			
			<section>
			<div class="container">
			<div >
	          <div class="col-md-8 ftco-animate">
			  <div> <p> </p> </div>
				<h1 class="bread"><b> Change Profile Picture </b></h1>
				</div>
				</div>
				</div>
			</section>
			
			<section class="ftco-section-3">
				<div class="photograhy">
				<div class="row">
					
						
						<form action="" method="post" role="form" class="" name="form1" enctype="multipart/form-data">
						<center>
						<table class="table thead-dark" style="background-color: #242423; width: 100%; display:block;">
						<tr>
						<th>
						<input type="file" name="image" class= " btn btn-white btn-outline-white ">
						</th>
						</tr>
						<tr>
						<th>
						<input type="submit" class="btn btn-primary btn-outline-primary" name="submit1" value="Upload">
						</th>
						</tr>
						
						</form>
						
						<?php 
						
						
						if(isset($_POST['submit1']))
						{
							//	mysqli_query($con,"UPDATE user SET name = '$u' WHERE name = 'mandan' ");
							$image = mysqli_real_escape_string($con,file_get_contents($_FILES['image']['tmp_name']));
							$imagetyp = mysqli_real_escape_string($con,$_FILES['image']['type']);
							
							if(substr($imagetyp,0,5) == "image")
							{
								if(mysqli_query($con,"UPDATE user SET img = '$image' WHERE name = '$uname' "))
								{
								echo "<tr><th>Successfully Changed</tr></th>";
								/* sleep(2);
								header("Location:http://localhost/Project/louie/editprofile.php"); */
								}
								else { echo "<tr><th>muunji</tr></th>"; }
							}
							else {
								echo "<tr><th>Only Images are Allowed</tr></th>";
							}
						
							/* if(mysqli_query($con,"UPDATE user SET img = '$image' WHERE name = '$uname' "))
							{
								echo "success";
							}
							else { echo "muunji"; } */
							
						}
						?>
						
						</table>
						</center>
						
						
						
							
						
					</div>
				</div>
			</section>
	    <footer class="ftco-footer ftco-bg-dark ftco-section">
	      <div class="container px-md-5">
	       
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