<?php
include 'includes/art-config.inc.php';
try {
    
    // connect and retrieve data for filters    
    $subjectDB = new SubjectDB($pdo);

    $subject = $subjectDB->getAll(); 
    $list = $subject->fetchAll();
    

    $percentages = $subjectDB->paintingsOfSubjects();
    $perc = $percentages->fetchAll();

    
}
catch (PDOException $e) {
    die( $e->getMessage() );
 }

 $dataPoints = array();

 for($i =0; $i<sizeof($perc); $i++){
    $dataPoints[]=array("label"=> $perc[$i]['SubjectName'], "y"=> $perc[$i]['NumOfPaintings']); 
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
    <title>Art Store | Browse Subjects</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/icon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <style>
        p {
            text-align: justify !important
        }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <script>
        window.onload = function () {
 
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     theme: "light2", // "light1", "light2", "dark1", "dark2"
     title: {
         text: "Paintings by Subjects"
     },
     axisY: {
         title: "Number of Paintings",
         includeZero: false
     },
     data: [{
         type: "column",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
    </script>
</head>

<body>

    <?php include './includes/header.php'; ?>

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/banner.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Browse Subjects</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Browse Subjects</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Contact Area Start -->
    <div class="alime-portfolio-area section-padding-80 clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="chartContainer" style="height: 600px; width: 100%; margin:30px 0"></div>
                </div>

            </div>
            <hr>
            <h1 style="margin: 40px 0; color: #fc6060; text-align: center">List of Subjects</h1>
            <div class="row justify-content-center">
                
                <div class="col-lg-6">
                    <?php  
                 echo "
                 <table class='table table-hover' >
                 <thead>
                     <tr>
                     <th scope='col'>Subject ID</th>
                     <th scope='col'>Subject Name</th>
                     </tr>
                 </thead>
                 <tbody>
                     ";
                     for ($i =0; $i < sizeof($list)/2; $i++) { 
                        
                        // print_r($list[$i]['ArtistID']);

                        
                            echo '

                            <tr onclick="viewSubject(' .$list[$i]['SubjectID'] .')">
                            
                            <td ><span class="badge badge-info">' .utf8_encode($list[$i]['SubjectID']) . '</span></td>
                            <td>' .  utf8_encode($list[$i]['SubjectName']) . '</td>
                            </tr>
                   
                            ';

                     } 

                     echo '</tbody>
                        </table>
                        ';
                ?>


                </div>
                <div class="col-lg-6">
                    <?php  
                 echo "
                 <table class='table table-hover' >
                 <thead>
                     <tr>
                     <th scope='col'>Subject ID</th>
                     <th scope='col'>Subject Name</th>
                     </tr>
                 </thead>
                 <tbody>
                     ";
                     for ($i = round(sizeof($list)/2); $i < sizeof($list); $i++) { 
                        
                        // print_r($list[$i]['ArtistID']);

                        
                            echo '

                            <tr onclick="viewSubject(' .$list[$i]['SubjectID'] .')">
                            
                            <td ><span class="badge badge-info">' .utf8_encode($list[$i]['SubjectID']) . '</span></td>
                            <td>' .  utf8_encode($list[$i]['SubjectName']) . '</td>
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
    <script src="js/canvasjs.min.js"></script>
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
        function viewSubject(params) {
            window.location = ("single-subject.php?id=" + params)
        }
    </script>

</body>

</html>