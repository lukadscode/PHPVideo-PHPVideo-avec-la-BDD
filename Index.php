<?php
require ('PHP/ConnexionBDD.php');
require ('PHP/header.php');


?>
<body>
        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section class="banner-area banner-bg" data-background="img/banner/banner_bg01.jpg">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8">
                            <div class="banner-content">
                                <h6 class="sub-title wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1.8s">Movflx</h6>
                                <h2 class="title wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1.8s">Films <span>illimités</span>,Emisions TV & 4K 8d.</h2>
                                <div class="banner-meta wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s">
                                    <ul>
                                        <li class="quality">
                                            <span>Pg 42</span>
                                            <span>hd</span>
                                        </li>
                                        <li class="category">
                                            <a href="#">CESI,</a>
                                            <a href="#">DI2022</a>
                                        </li>
                                        <li class="release-time">
                                            <span><i class="far fa-calendar-alt"></i> 2022</span>
                                            <span><i class="far fa-clock"></i> 2 Years</span>
                                        </li>
                                    </ul>
                                </div>
                                <a href="https://www.youtube.com/watch?v=_9oRPJqBv1s" class="banner-btn btn popup-video wow fadeInUp" data-wow-delay=".8s" data-wow-duration="1.8s"><i class="fas fa-play"></i> Watch Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- banner-area-end -->

            <!-- services-area -->
            <section id="Movie" class="services-area services-bg" data-background="img/bg/services_bg.jpg">
    <div class="container">
    <h1 class="text-center mb-5">BEST MOVIES</h1>
        <div class="row align-items-center">
            <div class="row">
            
            <?php        
            // Requête pour récupérer les films
            $req = $pdo->prepare("SELECT * FROM movies");
            $req->execute();
            $stmt = $req->fetchAll();
            // Affichage des films
            foreach ($stmt as $row ) {
                $filmId = $row->id; // Récupérer l'ID du film
                $title = $row->title;
                $image = $row->image;
                $year = $row->year;
                $duration = $row->duration;
            ?>
            <div class="col-md-6">
                <div class="services-img-wrap">
                    <a href="film-detail.php"><img src="<?= $image ?>" alt="<?= $title ?>" class="movie-image" ></a>
                    <a href="film-detail.php" class="download-btn" >Watch <img src="fonts/download.svg" alt=""></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="services-content-wrap">
                    <div class="section-title title-style-two mb-20">
                        <span class="sub-title">Movie</span>
                        <h2 class="title"><?= $title ?></h2>
                    </div>
                    <p><?= $year ?> - <?= $duration ?> min</p>
                </div>
            </div>
            <?php
            }
            ?>
                
                </div>
        </div>
    </div>
</section>


        <!-- footer-area -->

        <?php require 'php/footer.php' ?>