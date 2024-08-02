<?php
require_once("connection.php");

// Check if a search query is submitted
$searchQuery = "";
if(isset($_POST['keywords'])) {
    $searchQuery = $_POST['keywords'];
    $query = "SELECT * FROM available_books WHERE bookname LIKE '%$searchQuery%'";
} else {
    $query = "SELECT * FROM available_books";
}

$result = mysqli_query($con, $query);
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

    <!-- jQuery Latest Version 1.x -->
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>

    <!-- Custom Script for Search Functionality -->
    <!-- Custom Script for Search Functionality -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").on("submit", function(e) {
                e.preventDefault();
                var searchKeyword = $("#keywords").val().toLowerCase().trim();

                if (searchKeyword) {
                    $(".book-item").hide();
                    var found = false;

                    $(".book-item").each(function() {
                        var bookName = $(this).data("bookname").toLowerCase().trim();
                        if (bookName === searchKeyword) {
                            found = true;
                            $(this).slideDown();
                        }
                    });

                    if (!found) {
                        alert("Book not found");
                        $(".book-item").show();
                    }
                } else {
                    $(".book-item").show();
                }
            });

            $("#keywords").on("input", function() {
                var searchKeyword = $(this).val().toLowerCase().trim();
                if (!searchKeyword) {
                    $(".book-item").show();
                }
            });
        });
    </script>
</head>
<body>

    <!-- Start: Header Section -->
    <header id="header-v1" class="navbar-wrapper inner-navbar-wrapper">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="navbar-header">
                                <div class="navbar-brand">
                                    <h1>
                                        <a href="index-2.php">
                                            <img src="images/libraria-logo-v3.png" alt="LIBRARIA" />
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
                                </div>
                            </div>
                            <div class="navbar-collapse hidden-sm hidden-xs">
                                <ul class="nav navbar-nav" style="margin-left: 200px;">
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="teacher_student.php">Home</a>
                                    </li>
                                    <li class="dropdown active">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="books-media-gird-view-v3.php">Available Books</a>
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

    <!-- Start: Page Banner -->
    <section class="page-banner services-banner">
        <div class="container">
            <div class="banner-header">
                <h2>Books Listing</h2>
                <span class="underline center"></span>
                <p class="lead">Books are as Follow.....</p>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="project.php">Home</a></li>
                    <li>Books</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End: Page Banner -->
    <section class="search-filters">
        <div class="container">
            <div class="filter-box">
                <h3>What are you looking for at the library?</h3>
                <form action="" method="post">
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <div class="form-group">
                            
                            <input class="form-control" placeholder="Enter Book Name " id="keywords" name="keywords" type="text">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                            <input class="form-control" type="submit" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section><br><br>
    <!-- Start: Products Section -->
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="books-full-width">
                    <div class="container">
                        <div class="booksmedia-fullwidth">
                            <ul>
                                <?php if(mysqli_num_rows($result) > 0) { 
                                    while($row = mysqli_fetch_assoc($result)) { ?>
                                        <li class="book-item" data-bookname="<?php echo $row['book_id']; ?>" style="padding:20px;line-height:10px">
                                            <div class="book-list-icon green-icon"></div>
                                            <figure>
                                                
                                               
                                                    <header>
                                                        <h4><?php echo $row['bookname']; ?></h4>
                                                        <p><strong>Author : </strong><?php echo $row['Author']; ?></p>
                                                        <p><strong>Publisher: </strong><?php echo $row['publisher']; ?></p>
                                                        <p><strong>Pages : </strong><?php echo $row['pages']; ?></p>
                                                    </header>
                                                    <ul>
                                                        <strong>Edition : </strong><?php echo $row['edition']; ?>
                                                    </ul>
                                                
                                            </figure>
                                        </li>
                                    <?php } 
                                } else { ?>
                                    <li>No books found</li>
                                <?php } ?>  
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- End: Products Section -->

    <!-- Start: Social Network -->
    <section class="social-network section-padding">
        <div class="container">
            <div class="center-content">
                <h2 class="section-title">Follow Us</h2>
                <span class="underline center"></span>
            </div>
            <ul>
                <li>
                    <a class="facebook" target="_blank" style="border-radius:100%;">
                        <span>
                            <i class="fa fa-facebook-f"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="twitter" target="_blank" style="border-radius:100%;">
                        <span>
                            <i class="fa fa-twitter"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="google" target="_blank" style="border-radius:100%;">
                        <span>
                            <i class="fa fa-google-plus"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="rss" target="_blank" style="border-radius:100%;">
                        <span>
                            <i class="fa fa-rss"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="linkedin" target="_blank" style="border-radius:100%;">
                        <span>
                            <i class="fa fa-linkedin"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="youtube" target="_blank" style="border-radius:100%;">
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
                    <div class="footer-text col-md-3"></div>
                    <div class="col-md-9 pull-right">
                        <ul>
                            <li><a href="project.php">Home</a></li>
                            <li><a href="#">Books</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End: Footer -->

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
</body>
</html>
