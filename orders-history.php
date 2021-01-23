<?php
session_start();
if (!isset($_SESSION['id'])) {
header( 'Location: login.php' ) ; }

require_once('./includes/art-config.inc.php');
require_once('./php/database-inc.php');
$orders = readCustomerOrders($_SESSION['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Art Store | Orders History</title>

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

        .contact-area {
            margin: 5em 0;
        }

        a.btnghost {
            border: 2px solid #333;
            background-color: transparent;
            padding: 15px 20px;
            letter-spacing: 3px;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 400;
            color: #333;
            margin-top: 20px;
            display: inline-block;
        }

        a.btnghost:hover {
            background-color: #333;
            color: #fff;
            border: 2px solid #333;
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
                        <h2 class="page-title">Orders History</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Orders History</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Contact Area Start -->
    <div class="contact-area section-padding-40-50">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 section-padding-0-40">
                    <div class="well well-sm">
                        <div class="row" style="padding: 3em">

                            <div class="col-md-12 " id='content'>

                                <?php
                        if ( sizeof($orders) == 0) {
                            echo '<p">You have no orders</p>';
                         }
                        else{

                        echo "
                        <table class='table table-hover' >
                        <thead>
                            <tr>
                            <th scope='col'>#OrderID</th>
                            <th scope='col'>#ShipperID</th>
                            <th scope='col'>Date Started</th>
                            <th scope='col'>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
                      
                            foreach ($orders as $order) { 
                         
                                echo '

                                <tr onclick="viewOrder(' .$order['OrderID'] .')">
                                
                                <td ><span class="badge badge-info">' .utf8_encode($order['OrderID']) . '</span></td>
                                <td>' .  utf8_encode($order['ShipperID']) . '</td>
                                <td>' .  utf8_encode($order['DateStarted']) . '</td>
                                <td>' .  utf8_encode($order['Quantity']) . '</td> </a>   
                                </tr>
                       
                                ';
                                
                              }
                         
                        echo '</tbody>
                        </table><button id="print" type="button" class="btn btn-success"><i class="fa fa-file-pdf"></i> Save as PDF</button>
                        ';

                    }
                        ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 section-padding-0-40">
                    <div class="well well-sm">
                        <div class="row" style="padding: 3em">
                            <div class="col-md-12">
                                <a href="./albumlist.php" class="btnghost mt-30 wow fadeInUp" data-wow-delay="500ms"
                                    style="width:250px"><i class="fa fa-heart"></i> VIEW FAVOURITES</a>
                                 </div>
                            <div class="col-md-12">

                                <a href="./user-profile.php" class="btnghost mt-30 wow fadeInUp" data-wow-delay="700ms"
                                    style="width:250px"><i class="fa fa-user"></i> USER PROFILE</a>
                            </div>
                            
                            

                        </div>
                    </div>
                </div>

            </div>
            <hr>
            <div class="row">
                <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                if ( isset($_GET['order']) ) {
                                    $orderDetails = readOrderDetail($_GET['order']);
                             
                                ?>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4>Details for Order<strong> 
                                <?php echo utf8_encode($_GET['order']); ?></strong></h4>
                    </div>
                    <table class="table" >
                        <tr>
                            <th>OrderID</th>
                            <th>Painting</th>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Shape</th>
                            <th>Cost (MSRP)</th>
                            <th>Frame Price</th>
                            <th>Glass Price</th>
                        
                        </tr>

                        <?php foreach ($orderDetails as $detail) { 

                                            echo '<tr>';
                                            echo '<td>' . $detail['OrderID'] . '</td>';
                                            echo "<td><a href='single-painting.php?id=". $detail['PaintingID'] ."'><img src='img/art/works/square-medium/". $detail['ImageFileName'] . ".jpg'></a></td>";
                                            echo "<td><a href='single-painting.php?id=". $detail['PaintingID'] ."'>" . $detail['Title'] . "</a></td>";
                                            echo '<td>' . $detail['FirstName'] .' '. $detail['LastName'] .  '</td>';
                                            echo '<td>' . $detail['ShapeName'] . '</td>';
                                            echo '<td>' . $detail['MSRP'] . '</td>';
                                            echo '<td>' . $detail['FPrice'] . '</td>';
                                            echo '<td>' . $detail['GPrice'] . '</td>';
                                            echo '</tr>    ';  

                                        } ?>
                                        
                    </table>
                </div>
                <?php 
                                }
                                }
                            ?>

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
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    <script>
            function viewOrder(params){
                window.location = ("orders-history.php?order="+params)
            }

                        var doc = new jsPDF('p', 'pt', 'letter');
            var specialElementHandlers = {
                '#editor': function (element, renderer) {
                    return true;
                }
            };

            $('#print').click(function () {
                doc.fromHTML($('#content').html(), 80, 80, {
                    'width': 570,
                        'elementHandlers': specialElementHandlers
                });
                doc.save('order-detail.pdf');
            });
    </script>

</body>

</html>