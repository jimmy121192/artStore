<?php
session_start();
if (!isset($_SESSION['id'])) {
header( 'Location: login.php' ) ; }


require_once('./includes/art-config.inc.php');
require_once('./php/database-inc.php');
$user = readUserProfile($_SESSION['id']);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Art Store | User Profile</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/icon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <style>

    .list-group-item i {
        color: #fc6060;
    }
    .contact-area{
        margin: 5em 0;
    }
    a.btnghost {
	border:2px solid #333;
	background-color:transparent;
	padding:15px 20px;
	letter-spacing:3px;
	font-size:12px;
	text-transform:uppercase;
	font-weight:400;
	color:#333;
	margin-top:20px;
	display:inline-block;
}
    a.btnghost:hover {
        background-color:#333;
        color:#fff;
        border:2px solid #333;
    }
    </style>
</head>

<body>

    <?php include './includes/header.php'; ?>

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/banner.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">User Profile</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Contact Area Start -->
    <div class="contact-area section-padding-80-50">
    <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 section-padding-0-80">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="./img/bg-img/53.jpg" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">

                        <?php
                        echo "
                        <h4 style='color: #fc6060;'>".$user['FirstName']." ".$user['LastName']."</h4>
                        <ul class='list-group list-group-flush'>
                        <li class='list-group-item'><i class='fa fa-globe-americas'></i> ".$user['City'].", ".$user['Region'].", ".$user['Country']."</li>
                        <li class='list-group-item'><i class='fa fa-map-marked-alt'></i> ".$user['Address']."</li>
                        <li class='list-group-item'><i class='fa fa-envelope'></i> ".$user['Email']."</li>
                        <li class='list-group-item'><i class='fa fa-mobile-alt'></i> ".$user['Phone']."</li>
                        <li class='list-group-item'><i class='far fa-id-badge'></i> CustomerID: ".$user['CustomerID']."</p></li>
                        </ul>
                        ";
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 section-padding-0-80">
            <div class="well well-sm">
                <div class="row">
                
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                <a href="./albumlist.php" class="btnghost mt-30 wow fadeInUp" data-wow-delay="500ms" style="width:250px"><i class="fa fa-heart"></i> VIEW FAVOURITES</a> <br>
                <a href="./orders-history.php" class="btnghost mt-30 wow fadeInUp" data-wow-delay="700ms" style="width:250px"><i class="fa fa-history"></i> ORDERS HISTORY</a>
                </div>
                </div>
            </div>
        </div>


    </div>
</div>
    </div>


    <!-- Footer Area End -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content d-flex align-items-center justify-content-between">
                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p>
                            “A picture is a poem without words” - <a href="" target="_blank">Horace</a>
                            </p>
                        </div>

                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="#"><i class="ti-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-twitter-alt" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-linkedin" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-pinterest" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/alime.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>