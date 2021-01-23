<?php


 session_start();
 session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Art Store | Login</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/icon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">

</head>

<body>

    <?php include './includes/header.php'; ?>

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/banner.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Login</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login</li>
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
                <div class="col-md-4">
                </div>
                <div class="col-md-4">

                    <form id="login-form" method="post" action="php/login-script.php">
                        <div class="mb-2">
                            <label for="validationDefaultUsername">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="username" type="text" class="form-control" id="validationDefaultUsername" placeholder="Username"
                                    aria-describedby="inputGroupPrepend2" required>
                            </div>

                        </div>
                        <div class="mb-2">

                            <label for="validationDefaultUsername">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-key"></i></span>
                                </div>
                                <input name="password" type="password" class="form-control" id="validationDefaultUsername" placeholder="Password"
                                    aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>

                        <div class="form-group">

                        </div>

                        <button class="btn btn-info" type="submit">Sign In</button>

                    </form>
                </div>
                <div class="col-md-4">
                <h6>Test Account:</h6>
                <p>User: ellie.sullivan@shaw.ca</p>
                <p>Pass: 6edddf2a896de8586087175dfff26b25</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Map Area End -->

    <?php include './includes/footer.php'; ?>

    <!-- Footer Area End -->

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