<!-- Preloader -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- /Preloader -->

<!-- Top Search Form Area -->
<div class="top-search-area">
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Close -->
                    <button type="button" class="btn close-btn" data-dismiss="modal"><i class="ti-close"></i></button>
                    <!-- Form -->
                    <form action="browse-paintings.php" method="post">
                        <input type="search" name="keyword" class="form-control" placeholder="Type the name of a painting and hit enter...">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header Area Start -->
<header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="alimeNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="./index.php"><img src="img/logo.png"><a href="index.html"></a></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li><a href="./index.php">Home</a></li>
                                <!-- <li><a href="./products.html">Products</a></li> -->

                                <li><a href="./browse-paintings.php">Browse</a>
                                    <ul class="dropdown">
                                        <li><a href="./browse-artists.php">Artists</a></li>
                                        <li><a href="./browse-galleries.php">Galleries</a></li>
                                        <li><a href="./browse-genres.php">Genres</a></li>
                                        <li><a href="./browse-paintings.php">Paintings</a></li>
                                        <li><a href="./browse-subjects.php">Subjects</a></li>

                                    </ul>
                                </li>

                                <li><a href="./blog.php">Blog</a></li>
                                <li><a href="./contact.php">Contact</a></li>
                                <li><a href="./about.php">About</a></li>
                                <li><a href="">Account</a>
                                    <ul class="dropdown">
                                        <li><a href="login.php">Login/ Logout</a></li>
                                        <li><a href="user-profile.php">Edit Profile</a></li>
                                        <li><a href="">Choose Language</a></li>
                                        <li><a href="#">Account Settings</a></li>

                                    </ul>
                                </li>

                                <li><a href="./favourites.php"><i class="icon_heart"></i> </a></li>

                                <li><a href="./cart.html"><i class="icon_cart"></i></a> </li>
                                <li data-toggle="modal" data-target="#searchModal"><a><i class="icon_search"></i></a>
                                </li>
                            </ul>

                            <!-- Search Icon -->

                        </div>

                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->