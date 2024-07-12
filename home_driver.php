<?php
include("protect_driver.php");
include("dbconnect.php");
extract($_REQUEST);

$uname=$_SESSION['driver'];

$q3=mysqli_query($connect,"select * from cargo_driver where uname='$uname'");
$r3=mysqli_fetch_array($q3);
$truckno=$r3['truckno'];


if(isset($btn))
	{
	$loc=$lat.",".$lon;
	$message="Location: $loc";	
	mysqli_query($connect,"update cargo_truck set lat='$lat',lon='$lon' where truckno='$truckno'");
	?>
		<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'home_driver.php';
}, 6000);
</script>

		<?php
	}
$q4=mysqli_query($connect,"select * from cargo_truck where truckno='$truckno'");
$r4=mysqli_fetch_array($q4);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php include("title.php"); ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Anyar - v4.9.1
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    //x.innerHTML = "Latitude: " + position.coords.latitude + 
    //"<br>Longitude: " + position.coords.longitude;	
	document.form1.lat.value=position.coords.latitude;
	document.form1.lon.value=position.coords.longitude;
	
}
</script>
</head>

<body onLoad="getLocation()">

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">cargo@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
      </div>
      <div class="cta d-none d-md-block">
        <!--<a href="bus.php" class="scrollto">Track Bus</a>-->
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="">Cargo Management</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="home_driver.php">Home</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
          
          <!--<li><a href="blog.html">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

   <section id="services" class="services">
      <div class="container" data-aos="fade-up">
			
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
        <div class="section-title">
          <h3> Driver: <?php echo $uname.": ".$r3['name']; ?></h3>
        </div>
		
		
		<form name="form1" method="post">
		 <div class="row">
		 <div class="col-md-6">
		 </div>
		
	<div class="col-md-3">
	 <input type="hidden" name="lat">
		<input type="hidden" name="lon">
	<input type="submit" name="btn" value="Refresh" class="btn">
	</div>
	</div>
		</form>
		<h3 align="center"><?php echo $message; ?></h3>
		
		<?php
		if($truckno!="")
		{
		?>
		<h3>Cargo Details</h3>
        <div class="row">
		
		<?php
		$q1=mysqli_query($connect,"select * from cargo_details where truckno='$truckno'");
		$n1=mysqli_num_rows($q1);
		if($n1>0)
		{
			while($r1=mysqli_fetch_array($q1))
			{
			
		?>
          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h4><a href=""><?php echo $r1['idno']; ?></a></h4>
              <p>Loaded Weight: <?php echo $r1['ldweight']; ?></p>
              <p>Loaded Petrol: <?php echo $r1['petrol']; ?></p>

			  <p>Place: <?php echo $r1['place']; ?></p>
			  <p>Amount: <?php echo $r1['amount']; ?></p>
        <p>Customer: <?php echo $r1['user']; ?></p>
			 
            </div>
          </div>
		 <?php
		 	}
		 }
		 ?> 
		  
         

      </div>
	  
	  <?php
	  }//bus
	  ?>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        <?php include("title.php"); ?><strong><span></span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/ -->
         <a href="https://bootstrapmade.com/"></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>