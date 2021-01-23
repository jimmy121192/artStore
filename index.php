

<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset=utf-8>
    <meta name="description" content="Art Store for COMP 4130">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Art Store | COMP 4130</title>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="./img/icon.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">

    <script>
        $(function () {

            // initialize semanticUI components

            $('.ui.menu .ui.dropdown').dropdown({
                on: 'hover'
            });

            $('.ui.menu a.item')
                .on('click', function () {
                    $(this).addClass('active')
                        .siblings()
                        .removeClass('active');
                });

            $('.menu .item').tab();

            $('#artwork').on('click', function () {
                $('.ui.fullscreen.modal').modal('show');
            });

        });
    </script>

</head>

<body>
    <?php include './includes/header.php'; ?>

    <!-- Welcome Area Start -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
            <!-- Single Slide -->
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url('https://siteimages.agora-gallery.com/galleryPhotos/2016/mezzanine2.jpg');">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-lg-8 col-xl-6">
                            <div class="welcome-text">
                                <h2 data-animation="bounceInDown" data-delay="900ms">Art Store</h2>
                                <p data-animation="bounceInDown" data-delay="500ms">A place for you to find the piece
                                    of art that you love</p>
                                <div class="hero-btn-group" data-animation="bounceInDown" data-delay="100ms">
                                    <a href="contact.php" class="btn alime-btn mb-3 mb-sm-0 mr-4">Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Slide -->
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url('https://images.unsplash.com/photo-1551547600-8d30c2559da8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80');">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-lg-8 col-xl-6">
                            <div class="welcome-text">
                                <h2 data-animation="bounceInUp" data-delay="100ms">Shop with us</h2>
                                <div class="hero-btn-group" data-animation="bounceInUp" data-delay="900ms">
                                    <a href="browse-paintings.php" class="btn alime-btn mb-3 mb-sm-0 mr-4">View Art</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url('https://images.unsplash.com/photo-1472851294608-062f824d29cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80');">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-lg-8 col-xl-6">
                            <div class="welcome-text">
                                <h2 data-animation="bounceInUp" data-delay="100ms">Find your daily dose of inspiration</h2>
                                <div class="hero-btn-group" data-animation="bounceInUp" data-delay="900ms">
                                    <a href="about.php" class="btn alime-btn mb-3 mb-sm-0 mr-4">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Welcome Area End -->

    <section class="art-content">
        <div class="container">
            <div class="row art-index">
                <div class="col-lg-6">
                <a href="browse-artists.php"><h1>Paintings By <span style="color:#fc6060">Artist</span></h1></a>
                    <p>Every piece of art we offer is available in a multitude of products and sizes to fit any décor
                        style or budget.</p>
                </div>

                <div class="col-lg-6">
                    <div class="single-post-area">
                        <!-- Post Thumbnail -->
                        <a href="#" class="post-thumbnail"><img src="img/bg-img/58.jpg" alt=""></a>
                        <!-- Post Catagory -->
                        <a href="browse-artists.php" class="btn post-catagory">Paintings By Artist</a>
                        <!-- Post Conetent -->
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#">30 Products</a>
                            </div>
                            <a href="browse-artists.php" class="post-title">“Every artist was first an amateur”</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row art-index">
                <div class="col-lg-6">
                    <div class="single-post-area" >
                        <!-- Post Thumbnail -->
                        <a href="browse-galleries.php" class="post-thumbnail"><img class="rounded" src="img/bg-img/gallery.jpg" alt=""></a>
                        <!-- Post Catagory -->
                        <a href="browse-galleries.php" class="btn post-catagory">Paintings By Gallery</a>
                        <!-- Post Conetent -->
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#">29 Products</a>
                            </div>
                            <a href="browse-galleries.php" class="post-title">"For me, art doesn't stop at the gallery space" - Petra Collins</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                <a href="browse-galleries.php"><h1>Paintings By <span style="color:#fc6060">Gallery</span></h1></a>
                    <p>Every piece of art we offer is available in a multitude of products and sizes to fit any décor
                        style or budget.</p>
                </div>
            </div>
            <hr>
            <div class="row art-index">
                <div class="col-lg-6">
                <a href="browse-genres.php"><h1>Paintings By <span style="color:#fc6060">Genres</span></h1></a>
                    <p>Every piece of art we offer is available in a multitude of products and sizes to fit any décor
                        style or budget.</p>
                </div>

                <div class="col-lg-6">
                    <div class="single-post-area" >
                        <!-- Post Thumbnail -->
                        <a href="browse-genres.php" class="post-thumbnail"><img class="rounded" src="img/bg-img/genre.jpg" alt=""></a>
                        <!-- Post Catagory -->
                        <a href="browse-genres.php" class="btn post-catagory">Paintings By Genres</a>
                        <!-- Post Conetent -->
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#">50 Products</a>
                            </div>
                            <a href="browse-genres.php" class="post-title">The Female Body Shape Men Find Most Attractive</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row art-index">
                <div class="col-lg-6">
                    <div class="single-post-area">
                        <!-- Post Thumbnail -->
                        <a href="browse-subjects.php" class="post-thumbnail"><img class="rounded" src="img/bg-img/56.jpg" alt=""></a>
                        <!-- Post Catagory -->
                        <a href="browse-subjects.php" class="btn post-catagory">Paintings By Subjects</a>
                        <!-- Post Conetent -->
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="">34 Products</a>
                            </div>
                            <a href="browse-subjects.php" class="post-title">Find inspiration for your own art</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                <a href="browse-subjects.php"><h1>Paintings By <span style="color:#fc6060">Subjects</span></h1></a>
                    <p>Every piece of art we offer is available in a multitude of products and sizes to fit any décor
                        style or budget.</p>
                </div>
            </div>

        </div>
    </section>

   

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

</body>

</html>