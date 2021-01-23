<?php
include 'includes/art-config.inc.php';
include 'includes/art-functions.inc.php';
session_start();
$default=1;

if (isset($_SESSION['favItems'])) {
    $default = $_SESSION['favItems'];
}
try {
    
    $paintDB = new PaintingDB($pdo);
    $paintings = $paintDB->getFavouritePaintings($default); 
  
}
catch (PDOException $e) {
    die( $e->getMessage() );
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Art Store | Favourites</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/icon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <link href="css/semantic.css" rel="stylesheet">
    <link href="css/icon.css" rel="stylesheet">
    <style>
        p {
            text-align: justify !important
        }

        .ui.segment {
            border: none;
            /* box-shadow: none; */
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
                        <h2 class="page-title">Favourites</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Favourites</li>
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
            <div class="row justify-content-center">
                <h1 style="margin: 40px 0; color: #fc6060; text-align: center">Favourite Paintings</h1>
                <div class="col-lg-12">
                    <ul class="ui divided items" id="paintingsList">

                        <?php  while ($work = $paintings->fetch()) { ?>

                        <li class="item">
                            <a class="ui small image" href="single-painting.php?id=<?php echo $work['PaintingID']; ?>"><img
                                    class="img-thumbnail" src="img/art/works/square-medium/<?php echo $work['ImageFileName']; ?>.jpg"></a>
                            <div class="content">
                                <a class="header" href="single-painting.php?id=<?php echo $work['PaintingID']; ?>">
                                    <?php echo utf8_encode($work['Title']); ?></a>
                                <div class="meta">Year: <span class="badge badge-success">
                                        <?php echo utf8_encode($work['YearOfWork']); ?></span></div>
                                <div class="description">
                                    <p>
                                        <?php echo utf8_encode($work['Excerpt']); ?>
                                    </p>
                                </div>
                            </div>
                        </li>

                        <?php } ?>

                    </ul>
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