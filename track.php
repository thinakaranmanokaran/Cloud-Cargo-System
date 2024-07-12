<?php
session_start();
$uname=$_SESSION['username'];
include("dbconnect.php");
include("distance.php");
extract($_REQUEST);

if($act=="del")
{
  $q1=mysqli_query($connect,"select * from cargo_booking where user='$uname' and truckno='$truckno' and status='1'");
$n1=mysqli_num_rows($q1);
		if($n1==1)
		{
  $otp=rand(1000,9999);

  $q3=mysqli_query($connect,"select * from  customer where username='$uname'");
  $r1=mysqli_fetch_array($q3);
  $mobile=$r1['mobile'];

mysqli_query($connect,"update customer set otp='$otp' where username='$uname'");
 $mesage="otp:$otp";
		echo '<iframe src="http://iotcloud.co.in/testsms/sms.php?sms=emr&name='.$uname.'&mess='.$mesage.'&mobile='.$mobile.'" width="10" height="10" ></iframe>'; 
		
		$msg="Your PIN No. has sending...";
		
?>
<script language="javascript">
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'otp.php?truckno=<?php echo $truckno;?>';
}, 5000);
</script>
<?php
}
else
		{
		$msg="No Record";
		}
}


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
</head>

<body>

<div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">Cargo@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
      </div>
      <div class="cta d-none d-md-block">
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
        <!--<ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="login_driver.php">Driver</a></li>
		  <li><a class="nav-link scrollto" href="login_stu.php">Student</a></li>
		  <li><a class="nav-link scrollto" href="login_staff.php">Staff</a></li>
          <li><a class="nav-link scrollto" href="login.php">Admin</a></li>
          <li><a class="nav-link scrollto active" href="feepay.php">Pay Fees</a></li>-->

          
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

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        
        <h2></h2>
        <?php include("links1.php"); ?>


      </div>
    </section><!-- End Breadcrumbs -->

  <main id="main">

   <section id="services" class="services">
      <div class="container" data-aos="fade-up">
			
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
        <div class="section-title">
          <h2>Truck Tracking</h2>
        </div>
		<p style="color:red"><?php echo $msg;?>
		
		<form name="form1" method="post">
		 <div class="row">
		 <div class="col-md-3">
		 </div>
         <?php
		$q1=mysqli_query($connect,"select * from cargo_booking where user='$uname' and status='1'");
		$n1=mysqli_num_rows($q1);
        if($n1>0)
		{
            ?>
		  <div class="col-md-3">
		 <select name="truckno" class="form-control">
	<?php
	$cq=mysqli_query($connect,"select * from cargo_truck");
	while($cr=mysqli_fetch_array($cq))
	{
	?>
	<option <?php if($truckno==$cr['truckno']) echo "selected"; ?>><?php echo $cr['truckno']; ?></option>
    <?php
	}
	?>
	</select>
	</div>
	<div class="col-md-3">
	<input type="submit" name="b1" value="Track Lorry" class="btn">
	</div>
	</div>
  
		</form>
    <br>
    <p align="center"><a href="track.php?act=del&truckno=<?php echo $truckno;?>">Send Us OTP</a></p>

      <?php
    }
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