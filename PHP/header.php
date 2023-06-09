<?php session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/responsive.css">
        <link rel="stylesheet" href="/css/styleP.css">
    
    <header>
        <div id="sticky-header" class="menu-area transparent-header">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="/img/logo/logo.png" alt="Logo">
                                    </a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="active menu-item-has-children"><a href="/index.php">Home</a></li>
                                        <li class="menu-item-has-children"><a href="/film-detail.php">Movie</a></li>
                                        <li><a href="/contact.php">contacts</a></li>
                                        <?php
                                        // Vérifier si l'utilisateur a le statut admin = 1
                                        // Récupérer les informations de l'utilisateur depuis la base de données
                                        // Remplacer par la vérification réelle du statut admin
                                        if ( isset($_SESSION['auth']->admin) && ($_SESSION['auth']->admin == "1")) :
                                        ?>
                                        <li><a href="/php/model/User_update.php">Administration</a></li>
                                        <?php endif ?>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <?php if(!isset($_SESSION['auth'])) : ?>
                                        <li class="header-btn"><a href="Connexion.php" class="btn">Sign In</a></li>
                                        <?php else : ?>
                                        <li class="header-btn"><a href="/php/logout.php" class="btn">Logout</a></li>
                                        <?php endif ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <!-- Mobile Menu -->
                        <div class="mobile-menu">
                            <div class="close-btn"><i class="fas fa-times"></i></div>

                            <nav class="menu-box">
                                <div class="nav-logo"><a href="index.html"><img src="img/logo/logo.png" alt="" title=""></a>
                                </div>
                                <div class="menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area-end -->
</head>
<body>
    <!-- Reste du contenu de la page -->
</body>
</html>
