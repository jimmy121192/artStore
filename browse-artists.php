<?php
include 'includes/art-config.inc.php';
try {
    
    // connect and retrieve data for filters    
    $artistDB = new ArtistDB($pdo);
    $artists = $artistDB->getAll(); 
    $list = $artists->fetchAll();
    $filter = 'Total Artists: '  ;
    
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
    <title>Art Store | Browse Artists</title>

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
                        <h2 class="page-title">Browse Artists</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Browse Artists</li>
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
                <div class="col-lg-12">
                <h2>List of Artists</h2>  
               
                 <?php  
                 echo "
                 <table class='table table-hover' >
                 <thead>
                     <tr>
                     <th scope='col'>#ArtistID</th>
                     <th scope='col'>Name</th>
                     <th scope='col'>Nationality</th>
                     <th scope='col'>Gender</th>
                     </tr>
                 </thead>
                 <tbody>
                     ";

                    for ($i =0; $i < sizeof($list); $i++) { 
                        
                        // print_r($list[$i]['ArtistID']);

                        
                            echo '

                            <tr onclick="viewArtist(' .$list[$i]['ArtistID'] .')">
                            
                            <td ><span class="badge badge-info">' .utf8_encode($list[$i]['ArtistID']) . '</span></td>
                            <td>' .  utf8_encode($list[$i]['FirstName']) .' '. utf8_encode($list[$i]['LastName']). '</td>
                            <td>' .  utf8_encode($list[$i]['Nationality']) . '</td>
                            <td>' .  utf8_encode($list[$i]['Gender']) . '</td>   
                            </tr>
                   
                            ';

                     } 

                     echo '</tbody>
                        </table>
                        ';
                ?>
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
    <script>
            function viewArtist(params){
                window.location = ("single-artist.php?id="+params)
            }
    </script>

</body>

</html>