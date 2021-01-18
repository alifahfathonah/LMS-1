<?php
include "db.php";
include "layout/header.php";
$data = mysqli_query($conn, "SELECT * FROM groups ");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);
?>
<style>
    .nav-link{font-size:18px;padding:10px 0px}
    .hero-banner { padding: 100px 0;
    background: #d1d1d1 url(../../images/hero-background.png) no-repeat scroll center center / cover;
    position: relative;
}.home-info-box > img {width:30%; margin:30px 50px}
footer {
    font-size: 14px;
    position: relative;
    color: #ffffff;
    background: #d1d1d1 url(https://demo.themeqx.com/teachify-lms/public/themes/edugator/images/footer-bg.svg) no-repeat scroll center center / cover;
}.footer-top {background:rgba(0,0,0,0.5);}
  </style>
<body class=''>
  <div class="bgimg">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand ml-5 p-1" href="#"> <img src="img/KIRLogo.png" alt=""> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link ml-5" href="stripe_payment_gateway_php/index.php">Workbooks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  ml-3" href="#">About Us</a>
      </li><li class="nav-item">
        <a class="nav-link  ml-3" href="#">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-3" href="student/login.php">Students Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-3" href="instructor/login.php">Instructors Login</a>
      </li>
    
      </li><li class="nav-item">
        <a class="nav-link  ml-3" href="admin/login.php">Admin Login<i class="fas fa-signin "></i> </a>
      </li>
</ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="hero-banner py-3">

        <div class="container">
            <div class="row text-dark">
                <div class="col-md-12 col-lg-6">

                    <div class="hero-left-wrap"> <br><br>
                        <h1 class="hero-title mb-4">Learn from anywhere, anytime</h1>
                        <p class="hero-subtitle  mb-4">
                            Learn your favorite course, build your skills. <br> Enrolll course online from world-class instructors.
                        </p>
                        <a href="#courses" class="btn btn-primary btn-lg">Browse Course</a>
                    </div>

                </div>


                <div class="col-md-12 col-lg-6 hero-right-col">
                    <div class="hero-right-wrap">
                        <img src="https://demo.themeqx.com/teachify-lms/public/themes/edugator/images/hero-image.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-section-wrap home-info-box-wrapper py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <div class="home-info-box">
                        <img src="https://demo.themeqx.com/teachify-lms/public/themes/edugator/images/skills.svg">
                        <h3 class="info-box-title">Learn the latest skills</h3>
                        <p class="info-box-desc">like business analytics, graphic design, Python, and more</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="home-info-box">
                        <img src="https://demo.themeqx.com/teachify-lms/public/themes/edugator/images/career-goal.svg">
                        <h3 class="info-box-title">Get ready for a career</h3>
                        <p class="info-box-desc">in high-demand fields like IT, AI and cloud engineering</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="home-info-box">
                        <img src="https://demo.themeqx.com/teachify-lms/public/themes/edugator/images/instructions.svg">
                        <h3 class="info-box-title">Expert instruction</h3>
                        <p class="info-box-desc">Every course designed by expert instructor</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="home-info-box">
                        <img src="https://demo.themeqx.com/teachify-lms/public/themes/edugator/images/cartificate.svg">
                        <h3 class="info-box-title">Earn a certificate</h3>
                        <p class="info-box-desc">Get certified upon completing a course</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Courses -->
    <div class="home-section-wrap home-featured-courses-wrapper py-5 bg-light text-dark text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-wrap">
                            <h3 class="section-title" id="courses">
                                Featured courses

                                <a href="https://demo.themeqx.com/teachify-lms/public/featured-courses" class="btn btn-link float-right"><i class="la la-bookmark"></i> All Featured Courses</a>
                            </h3>

                            <p class="section-subtitle">Top quality courses has been featured, hand picked by us</p>
                        </div>
                    </div>
                </div>
                <div class="popular-courses-cards-wrap mt-3">
                    <div class="row">
           
<?php foreach($output as $out){?> 
<div class="col-md-4 course-card-grid-wrap ">
    <div class="course-card mb-5 bg-white border shadow" >

        <div class="course-card-img-wrap">
            <a href="https://demo.themeqx.com/teachify-lms/public/courses/management-skills-new-manager-training-in-essential-skills">
            <img src="https://demo.themeqx.com/teachify-lms/public/uploads/images/image_sm/aws-learn.jpg" class="w-100  img-fluid">    </a>

            <button class="course-card-add-wish btn btn-link btn-sm p-0" data-course-id="13">
                                    <i class="la la-heart-o"></i>
                            </button>
        </div>

        <div class="course-card-contents  p-4 ">
            <a href="https://demo.themeqx.com/teachify-lms/public/courses/management-skills-new-manager-training-in-essential-skills">
                <h5 class=" mb-3"><?php echo $out['name']?></h5>  </a>
                <p class="course-card-short-info mb-2 d-flex justify-content-between">
                    <span><i class="la la-play-circle "></i> 22 Workbooks</span>
                    <span><i class="la la-signal"></i> Beginner</span>
                </p>
          

            <div class="course-card-info-wrap">
                <p class="course-card-author d-flex justify-content-between">
                    <span>
                        <i class="la la-user"></i> by <?php $i=1; $iid=$out['iid']; $data1 = mysqli_query($conn, "SELECT * FROM instructor where id='$iid' ");
                        $output1 = mysqli_fetch_assoc($data1); echo $output1['name'] ?>
                    </span>
                                            <span>
                            <i class="la la-folder"></i>AWS Certification
                        </span>
                                    </p>
                            </div>

            <div class="course-card-footer mt-3">
                <div class="course-card-cart-wrap d-flex justify-content-between">
                    <div class="price-html-wrap  current-price-left "> <span class="current-price">$15.00</span> <span class="old-price"><s>$119.00</s></span></div>

                    <div class="course-card-btn-wrap">
                    <a class="btn btn-primary btn-sm mr-2 text-white" href="stripe_payment_getway_php/index.php?valid=30" role="button"
           >
            <span class="mr-2 d-none d-lg-inline ">Buy New Lisence</span>
        </a>
                                            </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php }?>


                                            </div>
                </div>
            </div>
        </div>
</div>
<?php include "layout/footer.php";?>