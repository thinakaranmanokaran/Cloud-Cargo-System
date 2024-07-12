<?php
include("protect_admin.php");
include("dbconnect.php");
extract($_REQUEST);



if(isset($btn))
{
$mq=mysqli_query($connect,"select max(id) from sbus_bus");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;

$ins=mysqli_query($connect,"insert into sbus_bus(id,busno,driver) values($id,'$busno','$driver')");
	if($ins)
	{
mysqli_query($connect,"update sbus_driver set busno='$busno' where uname='$driver'");

$mq2=mysqli_query($connect,"select max(id) from sbus_route");
$mr2=mysqli_fetch_array($mq2);
$id2=$mr2['max(id)']+1;

$lat="11.497015";
$lon="77.277092";
mysqli_query($connect,"insert into sbus_route(id,busno,route,lat,lon) values($id2,'$busno','BIT','$lat','$lon')");

?>
<script language="javascript">
alert("Added Successfully");
window.location.href="home.php";
</script>
<?php
	}
	else
	{
	$msg="Bus No. Already Exist!";
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

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">collegebus@info.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
      </div>
      <div class="cta d-none d-md-block">
        
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="">College Bus</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="home.php">Home</a></li>
		  <li><a class="nav-link scrollto" href="view_driver.php">Driver</a></li>
          <li><a class="nav-link scrollto" href="view_stu.php">Student</a></li>
		  <li><a class="nav-link scrollto" href="view_staff.php">Staff</a></li>
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

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

       
        <h2>Add Bus Information</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-4 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="assets/img/b2.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href=""></a>
              </h2>

             
              
            </article><!-- End blog entry -->

          
            
             

           

            </div><!-- End blog comments -->


          <div class="col-lg-8">

            <div class="sidebar">

              <h3 class="sidebar-title">Add Bus</h3>
              <div class="reply-form">
                <form name="form1" method="post" action="">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="busno" type="text" class="form-control" placeholder="Bus No." required>
                    </div>
					<div class="col-md-6 form-group">
                      <select name="driver" class="form-control" required>
					  <option value="">-Driver-</option>
					  <?php
					  $cq1=mysqli_query($connect,"select * from sbus_driver where busno=''");
					  while($cr1=mysqli_fetch_array($cq1))
					  {
					  ?>
					  <option value="<?php echo $cr1['uname']; ?>"><?php echo $cr1['uname']."-".$cr1['name']; ?></option>
					  <?php
					  }
					  ?>
					  </select>
                    </div>
                    
                  </div>
				  <br>
                 
                  <button type="submit" name="btn" class="btn btn-primary">Add</button>

                </form>
				<span style="color:#FF0000"><?php echo $msg; ?></span>
              </div><!-- End sidebar search formn-->

             
            

              </div><!-- End sidebar recent posts-->

            

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

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