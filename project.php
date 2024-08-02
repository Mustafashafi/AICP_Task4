<?php
require_once("connection.php");
if(isset($_SESSION['id'])){
  $user_id = $_SESSION['id'];
  $query = "SELECT * FROM `user` WHERE `id` = '$user_id'  ";
  $result = mysqli_query($con,$query);
  $user = mysqli_fetch_assoc($result);
}else{
  header("location:signin.php");
}

?>

<!DOCTYPE html>
<html lang="zxx">
 

<head>        
        
        <!-- Meta -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
        
        <!-- Title -->
        <title>..:: LIBRARY ::..</title>
        
        <!-- Favicon -->
        <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Mobile Menu -->
        <link href="css/mmenu.css" rel="stylesheet" type="text/css" />
        <link href="css/mmenu.positioning.css" rel="stylesheet" type="text/css" />
        
        <!-- Stylesheet -->
        <link href="style.css" rel="stylesheet" type="text/css" />
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        
        <!-- Start: Header Section -->
        <header id="header-v1" class="navbar-wrapper">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="navbar-header">
                                    <div class="navbar-brand">
                                        <h1>
                                            <a href="index-2.php">
                                                <img src="images/libraria-logo-v3.png"  />
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!-- Header Topbar -->
                                <div class="header-topbar hidden-sm hidden-xs">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="topbar-info">
                                                
                                                <a><i class="fa fa-envelope"></i>support@library.com</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="topbar-links">
                                                <a href="logout.php"><i class="fa fa-lock"></i>Logout</a>
                                                <span>|</span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-collapse hidden-sm hidden-xs">
                                    <ul class="nav navbar-nav" style="margin-left: 200px;">
                                        <li class="dropdown active">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="project.php">Home</a>
                                            
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="books-media-gird-view-v2.php">Available Books</a>
                                            
                                        </li>
                                        
                                        
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="issue books.php">Borrow Book </a>
                                            <ul class="dropdown-menu">
                                               
                                                <li><a href="returnbook.php">Return Book</a></li>
                                                <li><a href="issue_the_book.php">Borrow  Book</a></li>
                                                
                                            </ul>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                       
                    </nav>
                </div>
            </div>
        </header>
        <!-- End: Header Section -->
        
        <!-- Start: Slider Section -->
        <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
            
            <!-- Carousel slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <figure>
                        <img alt="Home Slide" src="1.jpg" style="height:700px"/>
                    </figure>
                    <div class="container">
                    <div class="carousel-caption">
                            <h2 style="font-family:math;font-size:62px">Welcome to Library</h2>
                            <h3 style="font-family:math;font-size:18px">Learning Anytime, Anywhere!</h3>
                            
                            <p style="font-family:math;font-size:18px">There are many variations of Books available, but the majority have suffered alteration in some form, by injected humor, or randomized words.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="2.jpg" style="height:700px" />
                    </figure>
                    <div class="container">
                    <div class="carousel-caption">
                            <h2 style="font-family:math;font-size:62px">Welcome to Library</h2>
                            <h3 style="font-family:math;font-size:18px">Learning Anytime, Anywhere!</h3>
                            
                            <p style="font-family:math;font-size:18px">There are many variations of  of Books available, but the majority have suffered alteration in some form, by injected humor, or randomized words.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="3.jpg" style="height:700px" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h2 style="font-family:math;font-size:62px">Welcome to Library</h2>
                            <h3 style="font-family:math;font-size:18px">Learning Anytime, Anywhere!</h3>
                            
                            <p style="font-family:math;font-size:18px">There are many variations of  of Books available, but the majority have suffered alteration in some form, by injected humor, or randomized words.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Controls -->
            <a class="left carousel-control" href="#home-v1-header-carousel" data-slide="prev"></a>
            <a class="right carousel-control" href="#home-v1-header-carousel" data-slide="next"></a>
        </div>
        <!-- End: Slider Section -->
       
        
        <!-- Start: Welcome Section -->
        <section class="welcome-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6" >
                        <div class="welcome-wrap">
                            <div class="welcome-text" >
                                <h2 class="section-title" style="font-family:math">Welcome to the library</h2>
                                <span class="underline center"></span>
                                
                               <p style="font-family:math;font-size:18px">Welcome to our college library, a sanctuary of knowledge where curiosity meets exploration. Here, amidst shelves adorned with literary treasures and scholarly tomes, you embark on a journey of discovery. Feel the gentle embrace of quietude as you delve into the vast expanse of human thought and imagination. Whether seeking solace in fiction's embrace or unraveling the mysteries of academia, this space is yours to explore. Our dedicated staff stands ready to assist, guiding your quest for enlightenment. So, dear visitor, step inside and let the whispers of wisdom guide you through the boundless realms of learning and inspiration. Welcome to our bibliophilic haven.
                                Welcome to our esteemed college library, where the scent of aged paper mingles with the promise of intellectual exploration. Here, every volume holds the potential to ignite your imagination and broaden your horizons. Embrace the tranquility of this sacred space as you embark on a journey of discovery and growth ...</p>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div style="float: right;position: absolute;top:10px;left: 700px;"><img src="images/download.png" alt="" style="width:550px;height: 650px;"></div>
        </section>
        <!-- End: Welcome Section -->
        
        
        <!-- Start: Social Network -->
        <section class="social-network section-padding">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title" style="font-family:math;font-size:38px">Follow Us</h2>
                    <span class="underline center"></span><br><br><br>
                    
                </div>
                <ul>
                    <li>
                        <a class="facebook" href="#" target="_blank" style="border-radius:100%;">
                            <span>
                                <i class="fa fa-facebook-f"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="#" target="_blank" style="border-radius:100%;">
                            <span>
                                <i class="fa fa-twitter"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="google" href="#" target="_blank" style="border-radius:100%;">
                            <span>
                                <i class="fa fa-google-plus"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="rss" href="#" target="_blank" style="border-radius:100%;">
                            <span>
                                <i class="fa fa-rss"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="linkedin" href="#" target="_blank" style="border-radius:100%;">
                            <span>
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="youtube" href="#" target="_blank" style="border-radius:100%;">
                            <span>
                                <i class="fa fa-youtube"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End: Social Network -->
        
        <!-- Start: Footer -->
        <footer class="site-footer">
           
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-text col-md-3">
                            
                        </div>
                        <div class="col-md-9 pull-right">
                            <ul>
                                <li><a href="project.php">Home</a></li>
                                <li><a href="books-media-gird-view-v2.php">Books</a></li>
                                
                                
                                
                                <li><a href="issue books.php">Issued Books</a></li>
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           
        </footer>
        <!-- End: Footer -->
        
        <!-- jQuery Latest Version 1.x -->
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        
        <!-- jQuery UI -->
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        
        <!-- jQuery Easing -->
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <!-- Mobile Menu -->
        <script type="text/javascript" src="js/mmenu.min.js"></script>
        
        <!-- Harvey - State manager for media queries -->
        <script type="text/javascript" src="js/harvey.min.js"></script>
        
        <!-- Waypoints - Load Elements on View -->
        <script type="text/javascript" src="js/waypoints.min.js"></script>

        <!-- Facts Counter -->
        <script type="text/javascript" src="js/facts.counter.min.js"></script>

        <!-- MixItUp - Category Filter -->
        <script type="text/javascript" src="js/mixitup.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        
        <!-- Accordion -->
        <script type="text/javascript" src="js/accordion.min.js"></script>
        
        <!-- Responsive Tabs -->
        <script type="text/javascript" src="js/responsive.tabs.min.js"></script>
        
        <!-- Responsive Table -->
        <script type="text/javascript" src="js/responsive.table.min.js"></script>
        
        <!-- Masonry -->
        <script type="text/javascript" src="js/masonry.min.js"></script>
        
        <!-- Carousel Swipe -->
        <script type="text/javascript" src="js/carousel.swipe.min.js"></script>
        
        <!-- bxSlider -->
        <script type="text/javascript" src="js/bxslider.min.js"></script>
        
        <!-- Custom Scripts -->
        <script type="text/javascript" src="js/main.js"></script>
        <script src="plugins/jquery/jquery.min.js"></script>

    </body>


</html>