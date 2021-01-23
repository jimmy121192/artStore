<?php
include 'includes/art-config.inc.php';
include 'includes/art-functions.inc.php';

$default = 406;
if (isset($_GET['id'])) {
    $default = $_GET['id']; 
}
try {
    
    $dbpaint = new PaintingDB($pdo);
    $row = $dbpaint->findById($default);
    
    $dbgenre = new GenreDB($pdo);
    $genres = $dbgenre->findForPainting($default);  
    
    $dbsubject = new SubjectDB($pdo);
    $subjects = $dbsubject->findForPainting($default);    
    
    $dbreview = new ReviewDB($pdo);
    $reviews= $dbreview->findForPainting($default);   
    $averageRating = round($dbreview->AverageForPainting($default)); 
    
    $dbglass = new GlassDB($pdo);
    $glasses = $dbglass->getAll();    
    
    $dbframe = new FrameDB($pdo);
    $frames = $dbframe->getAll();   
    
    $dbmatte = new MatteDB($pdo);
    $mattes = $dbmatte->getAll();     
    
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
    <title>Art Store | Painting Detail</title>

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
        .ui.segment{
          border: none;
          /* box-shadow: none; */
        }
    </style>
</head>

<body>

    <?php include './includes/header.php';?>

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/banner.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Painting Detail</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item"><a href="browse-paintings.php"><i class="fas fa-palette"></i> Browse Paintings</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Painting Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Blog Details Area Start -->
    <div class="alime--blog-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">

                <section class="ui segment grey100">
                    <div class="ui doubling stackable grid container">
                        <div class="nine wide column">
                            <img src="img/art/works/medium/<?php echo  $row['ImageFileName']; ?>.jpg" alt="..." class="ui big image"
                                id="artwork">
                        </div>
                        <div class="seven wide column">

                            <!-- Main Info -->
                            <div class="item">
                                <h2 class="header">
                                    <?php echo  utf8_encode($row['Title']); ?>
                                </h2>
                                <h3>
                                    <?php echo utf8_encode($row['FirstName'] . ' ' . $row['LastName']); ?>
                                </h3>
                                <div class="meta">
                                    <p>
                                        <?php echo generateRatingStars($averageRating); ?>
                                    </p>
                                    <p>
                                        <?php echo  utf8_encode($row['Excerpt']); ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Tabs For Details, Museum, Genre, Subjects -->
                            <?php include 'includes/painting-small-tabs.inc.php'; ?>

                            <!-- Cart and Price -->
                            <?php include 'includes/cart-box.inc.php'; ?>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Tabs for Description, On the Web, Reviews -->
    <?php include 'includes/painting-large-tabs.inc.php'; ?>

    <!-- Pager Area End -->
    <?php include './includes/footer.php'; ?>
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
    <script src="css/semantic.js"></script>
    <script src="js/misc.js"></script>

    <script>

        function addToFav(item){
            var favArr = []
            if (localStorage.getItem("favArr") !== null) {
            let curArr = localStorage.getItem("favArr");
            favArr.push(curArr);
            
            favArr.push(JSON.stringify(item));
            
            localStorage.setItem("favArr", favArr)
            }
            else{
            favArr.push(JSON.stringify(item));
            localStorage.setItem("favArr", favArr)
            }

   
                $.ajax({  
                type: "POST",  
                url: "http://localhost:8888/artStore/sessions.php",  
                data: { storageValue: localStorage.getItem("favArr") }
                
            });
        }
    
    </script>
    
</body>

</html>