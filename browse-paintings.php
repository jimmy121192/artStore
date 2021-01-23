<?php

include 'includes/art-config.inc.php';

try {
    
    // connect and retrieve data for filters    
    $artistDB = new ArtistDB($pdo);
    $artists = $artistDB->getAll();   
    
    $galleryDB = new GalleryDB($pdo);
    $galleries = $galleryDB->getAll(); 
    
    $shapeDB = new ShapeDB($pdo);
    $shapes = $shapeDB->getAll();    
    
    // now retrieve paintings ... either all or a subset
    $paintDB = new PaintingDB($pdo);
    $pageTitle = "Browse Paintings";

    // display search results
    if (isset($_POST['keyword']) && ! empty($_POST['keyword'])) {
      $paintings = $paintDB->getSearchResults($_POST['keyword']);
      $filter = 'Search Results for ' . $_POST['keyword'] ;
      $pageTitle = "Paintings Search Results";
  }
    
    // filter by artist?
    if (isset($_GET['artist']) && ! empty($_GET['artist'])) {
        $paintings = $paintDB->findByArtist($_GET['artist']);  
        $artist = $artistDB->findById($_GET['artist']);
        $filter = 'Artist = ' . makeArtistName($artist['FirstName'],$artist['LastName']) ;
    }
    
    // filter by museum?
    if (isset($_GET['museum']) && ! empty($_GET['museum'])) {
        $paintings = $paintDB->findByGallery($_GET['museum']);       
        $museum = $galleryDB->findById($_GET['museum']);
        $filter = 'Museum = ' . utf8_encode($museum['GalleryName']);
    }    
    
    // filter by shape?
    if (isset($_GET['shape']) && ! empty($_GET['shape'])) {
        $paintings = $paintDB->findByShape($_GET['shape']);       
        $shape = $shapeDB->findById($_GET['shape']);
        $filter = 'Shape = ' . $shape['ShapeName'];
    }     
                                            
    if (! isset($paintings) || $paintings->rowCount() == 0) {
        if(isset($_POST['keyword'])){    
          $filter = "No results found for " .$_POST['keyword'];
        }
        else {
        $paintings = $paintDB->getAll();
        $filter = "All Paintings [Top 20]";
        }
    }
   
}
catch (PDOException $e) {
   die( $e->getMessage() );
}

function outputOptions($data, $valueField, $dataField) {
  while ($single = $data->fetch()) { 
    echo '<option value=' . $single[$valueField] . '>';
    echo utf8_encode($single[$dataField]);
    echo '</option>'; 
  }       
}

function makeArtistName($first, $last) {
    return utf8_encode($first . ' ' . $last);
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
  <title>Art Store | Browse Paintings</title>

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
          box-shadow: none;
        }
        .breadcrumb-area{
          margin-bottom: 4em;
        }

    </style>
</head>

<body>

  <?php include './includes/header.php';?>
  <section class="breadcrumb-area bg-img bg-overlay jarallax " style="background-image: url(img/banner.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-content text-center">

            <h2 class="page-title">
              <?php  
                              echo $pageTitle;
                          ?>
            </h2>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php  
                                    echo $pageTitle;
                                ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>

  <main class="ui segment doubling stackable grid container">

    <section class="four wide column">
      <form class="ui form" method="get" action="browse-paintings.php">
        <h3 class="ui dividing header">Filters</h3>

        <div class="field">
          <label>Artist</label>
          <select class="ui fluid dropdown" name="artist">
            <option value='0'>Select Artist</option>
            <?php  
                    outputOptions($artists, 'ArtistID', 'LastName');
                ?>
          </select>
        </div>
        <div class="field">
          <label>Museum</label>
          <select class="ui fluid dropdown" name="museum">
            <option value='0'>Select Museum</option>
            <?php  
                   outputOptions($galleries, 'GalleryID', 'GalleryName');
                ?>
          </select>
        </div>
        <div class="field">
          <label>Shape</label>
          <select class="ui fluid dropdown" name="shape">
            <option value='0'>Select Shape</option>
            <?php  
                    outputOptions($shapes, 'ShapeID', 'ShapeName');
                ?>
          </select>
        </div>

        <button class="small ui orange button" type="submit">
          <i class="filter icon"></i> Filter
        </button>

      </form>
    </section>

    <section class="twelve wide column">
      <h1 class="ui header">Paintings</h1>
      <h3 class="ui sub header">
        <?php echo $filter; ?>
      </h3>
      <ul class="ui divided items" id="paintingsList">

        <?php  while ($work = $paintings->fetch()) { ?>

        <li class="item">
          <a class="ui small image" href="single-painting.php?id=<?php echo $work['PaintingID']; ?>"><img src="img/art/works/square-medium/<?php echo $work['ImageFileName']; ?>.jpg"></a>
          <div class="content">
            <a class="header" href="single-painting.php?id=<?php echo $work['PaintingID']; ?>">
              <?php echo utf8_encode($work['Title']); ?></a>
            <div class="meta"><span class="cinema">
                <?php echo makeArtistName($work['FirstName'],$work['LastName']); ?></span></div>
            <div class="description">
              <p>
                <?php echo utf8_encode($work['Excerpt']); ?>
              </p>
            </div>
            <div class="meta">
              <strong>
                <?php echo '$' . number_format($work['MSRP'],0); ?></strong>
            </div>
            <div class="extra">
              <a class="ui icon orange button" href="cart.php?id=<?php echo $work['PaintingID']; ?>"><i class="add to cart icon"></i></a>
              <a class="ui icon button" onclick=' <?php  echo "addToFav(" . $work["PaintingID"] .")"; ?>'><i class="heart icon"></i></a>
            </div>
          </div>
        </li>

        <?php } ?>

      </ul>
    </section>

  </main>

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