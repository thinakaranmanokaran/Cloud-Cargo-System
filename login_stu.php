<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);



$rdate=date("d-m-Y");
$ch1=mktime(date('h')+5,date('i')+30,date('s'));
$rtime=date('h:i:s A',$ch1);
$bus="bus_close.jpg";

	if(isset($btn))
	{
	$loc=$lat.",".$lon;
		$q1=mysqli_query($connect,"select * from cargo_details where idno='$idno'");
		$n1=mysqli_num_rows($q1);
		if($n1>0)
		{
		$r1=mysqli_fetch_array($q1);
		$truckno=$r1['truckno'];
		$idno=$r1['idno'];
		$name=$r1['name'];
		$email=$r1['email'];
		
			$q2=mysqli_query($connect,"select * from struck_det where truckno='$truckno' && idno='$idno' order by id desc");
			$n2=mysqli_num_rows($q2);
				if($n2>0)
				{
				$r2=mysqli_fetch_array($q2);
				$s1=$r2['stud_st'];
					if($s1=="0")
					{
					$st='1';
					$mess="Out from Cargo ";
					}
					else
					{
					$st='0';
					$mess="Entered into Cargo in truck";
					}
				}
				else
				{
				$st='0';
				$mess="Entered into Cargo in truck";
				}
				
				$mq=mysqli_query($connect,"select max(id) from struck_det");
				$mr=mysqli_fetch_array($mq);
				$id=$mr['max(id)']+1;
		
				mysqli_query($connect,"insert into struck_det(id,details,lat,lon,truckno,idno,stud_st,rdate,rtime,utype) values($id,'$mess','$lat','$lon','$truckno','$idno','$st','$rdate','$rtime','Cargo')");
			
		$message="Cargo: $name ($idno), has $mess, Location: $loc";	
		//echo '<iframe src="http://iotcloud.co.in/testmail/sendmail.php?message='.$message.'&email='.$email.'" style="display:none"></iframe>';
		$bus="bus_open.jpg";
		}
		else
		{
		$bus="bus_close.jpg";
		$st='2';
		$mess="Unknown";
		$mq=mysqli_query($connect,"select max(id) from struck_det");
		$mr=mysqli_fetch_array($mq);
		$id=$mr['max(id)']+1;

		mysqli_query($connect,"insert into struck_det(id,details,lat,lon,truckno,idno,stud_st,rdate,rtime) values($id,'$mess','$lat','$lon','$truckno','','$st','$rdate','$rtime')");
		$message="Unknown Person";
		}
		
		?>
		<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'login_stu.php';
}, 6000);
</script>

		<?php
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
      <!-- <div class="cta d-none d-md-block">
        <a href="bus.php" class="scrollto">Track Lorry</a>
      </div> -->
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
        <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="login_driver.php">Driver</a></li>
          <li><a class="nav-link scrollto" href="customer.php">Customer</a></li>
		      <li><a class="nav-link scrollto active" href="login_stu.php">Cargo</a></li>
          <li><a class="nav-link scrollto" href="login.php">Admin</a></li>
          
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

        <ol>
          <li><a href="index.php">Home</a></li>
        </ol>
        <h2>Cargo</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="assets/img/lorry5.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href=""></a>
              </h2>

             
              
            </article><!-- End blog entry -->

          
            
             

           

            </div><!-- End blog comments -->


          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Cargo loading</h3>
              <div class="reply-form">
                <form name="form1" method="post" action="">
                  <div class="row">
                    <div class="col form-group">
                      <input name="idno" type="text" class="form-control" placeholder="Idno." required>
					  <input type="hidden" name="lat">
		<input type="hidden" name="lon">
                    </div>
                    
                  </div>
				 
                  <br>
                  <button type="submit" name="btn" class="btn btn-primary">Submit</button>

                </form>
				<h3 align="center"><?php echo $message; ?></h3>
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