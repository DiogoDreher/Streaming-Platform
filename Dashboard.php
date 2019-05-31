<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Projeto Final TI 2</title>
    <link href="css-projeto.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="bootstrap.css" rel="stylesheet">
</head>

<body style="margin-top: 0;">

    <section class="section-barra">
        <nav class="barra">
            <a class="brand-barra" href="index.php"><i class="fas fa-bolt"
                    style="font-size: 20px; color: rgb(250, 188, 96)"></i> ThunderStream</a>
            <a class="link-barra" href="LogOut.php">Log Out</a>
        </nav>
    </section>

    <section class="page-container">
        <section class="content-wrap">



            <section class="container">

            <!-- PHP SCOPE TO CALL FUNCITONS-->
            <?php
         echo ErrorMessage();
         echo SuccessMessage();
         ?>
            <!--END OF PHP SCOPE-->

                <section id="indicadores" class="carousel slide my-4" data-ride="carousel">
                    <ol class="indicadores">
                        <li data-target="#indicadores" data-slide-to="0" class="active"></li>
                        <li data-target="#indicadores" data-slide-to="1"></li>
                        <li data-target="#indicadores" data-slide-to="2"></li>
                    </ol>
                    <section class="carousel-inner" role="listbox">
                        <section class="carousel-item active" style="text-align: center">
                            <img class="d-block img-fluid"
                                src="https://www.hdwallpapers.in/download/x_men_apocalypse_banner_poster-1600x900.jpg"
                                alt="First slide">
                        </section>
                        <section class="carousel-item" style="text-align: center">
                            <img class="d-block img-fluid"
                                src="https://blog.cyrildason.com/wp-content/uploads/2016/11/House-MD.png"
                                alt="Second slide">
                        </section>
                        <section class="carousel-item" style="text-align: center">
                            <img class="d-block img-fluid"
                                src="https://mypostercollection.com/wp-content/uploads/2018/07/The-Walking-Dead-poster-4-1024x768.jpg"
                                alt="Third slide">
                        </section>
                    </section>
                    <a class="carousel-control-prev" href="#indicadores" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#indicadores" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </section>

                <p class="homepage-categoria">Filmes</p>

                <section class="row">

                    <section class="col-lg-4 col-md-6 mb-4">
                        <section class="card h-100">
                            <a href="#"><img class="card-img-top"
                                    src="http://images5.fanpop.com/image/photos/32000000/Looper-Movie-Poster-looper-32031468-2560-1920.jpg"
                                    alt=""></a>
                            <section class="card-body">
                                <h4 class="card-title">
                                    <a href="#" class="card-title">Looper</a>
                                </h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                                    numquam aspernatur!</p>
                            </section>
                            <section class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9734; &#9734;</small>
                            </section>
                        </section>
                    </section>

                    <section class="col-lg-4 col-md-6 mb-4">
                        <section class="card h-100">
                            <a href="#"><img class="card-img-top"
                                    src="https://iphonewalls.net/wp-content/uploads/2013/05/Fight%20Club%20iPhone%20Wallpaper.jpg"
                                    alt=""></a>
                            <section class="card-body">
                                <h4 class="card-title">
                                    <a href="#" class="card-title">Fight Club</a>
                                </h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                                    numquam aspernatur!</p>
                            </section>
                            <section class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            </section>
                        </section>
                    </section>

                    <section class="col-lg-4 col-md-6 mb-4">
                        <section class="card">
                            <a href="#"><img class="card-img-top"
                                    src="https://boygeniusreport.files.wordpress.com/2017/10/the-matrix.jpg?quality=98&strip=all"
                                    alt=""></a>
                            <section class="card-body">
                                <h4 class="card-title">
                                    <a href="#" class="card-title">The Matrix</a>
                                </h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                                    numquam aspernatur!</p>
                            </section>
                            <section class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                            </section>
                        </section>
                    </section>

                </section>

                <p class="homepage-categoria">Séries</p>

                <section class="row">

                    <section class="col-lg-4 col-md-6 mb-4">
                        <section class="card h-100">
                            <a href="#"><img class="card-img-top"
                                    src="https://o.aolcdn.com/images/dims?quality=85&image_uri=https%3A%2F%2Fo.aolcdn.com%2Fimages%2Fdims%3Fresize%3D2000%252C2000%252Cshrink%26image_uri%3Dhttps%253A%252F%252Fs.yimg.com%252Fos%252Fcreatr-uploaded-images%252F2019-03%252F27b8b530-4d11-11e9-9a5d-abff109d9454%26client%3Da1acac3e1b3290917d92%26signature%3D7d7acac487a2489f651946f62b5d26164f82235a&client=amp-blogside-v2&signature=00ca69ada0f6e8d3ab1382d1dc216310dcae41e2"
                                    alt=""></a>
                            <section class="card-body">
                                <h4 class="card-title">
                                    <a href="#" class="card-title">Neon Genesis Evangelion</a>
                                </h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                                    numquam aspernatur!</p>
                            </section>
                            <section class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            </section>
                        </section>
                    </section>

                    <section class="col-lg-4 col-md-6 mb-4">
                        <section class="card h-100">
                            <a href="#"><img class="card-img-top"
                                    src="https://thewallpaper.co/wp-content/uploads/2016/10/Game-Of-Thrones-2015-Season-5-Poster-Wallpaper-free-4k-high-definition-amazing-background-wallpapers-pictures-widescreen-1080p-3840x2400-768x480.jpg"
                                    alt=""></a>
                            <section class="card-body">
                                <h4 class="card-title">
                                    <a href="#" class="card-title">Game of Thrones</a>
                                </h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                                    numquam aspernatur!</p>
                            </section>
                            <section class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                            </section>
                        </section>
                    </section>

                    <section class="col-lg-4 col-md-6 mb-4">
                        <section class="card h-100">
                            <a href="#"><img class="card-img-top"
                                    src="https://thats-normal.com/wp-content/uploads/2015/06/fringe_.jpg" alt=""></a>
                            <section class="card-body">
                                <h4 class="card-title">
                                    <a href="#" class="card-title">Fringe</a>
                                </h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                                    numquam aspernatur!</p>
                            </section>
                            <section class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9734; &#9734;</small>
                            </section>
                        </section>
                    </section>

                    <!--Footer-->

                    <?php require_once("Includes/footer.php"); ?>