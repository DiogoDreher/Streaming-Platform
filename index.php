<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>

<!DOCTYPE html>
<html>

<head>
  <title>Projeto Final TI 2</title>
  <link href="css/css-projeto.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body style="margin-top: 0;">

  <section class="section-barra">
    <nav class="barra">
      <a class="brand-barra" href="index.php"><i class="fas fa-bolt"
          style="font-size: 20px; color: rgb(250, 188, 96)"></i> ThunderStream</a>
      <?php 
        if (isset($_SESSION["UserId"]))
        {
          echo "<a class='link-barra' href='LogOut.php'>Log Out</a>
                <a class='link-barra' href='MyProfile.php'>My Profile</a>";
        }
        else
        {
          echo "<a class='link-barra' href='LogIn.php'>Log In</a>
                <a class='link-barra' href='SignUp.php'>Sign Up</a>";
        }
      ?>    
      
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
              <img class="d-block img-fluid" src="https://blog.cyrildason.com/wp-content/uploads/2016/11/House-MD.png"
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

        <p class="homepage-categoria">
          <a style="color: #ffffff; text-decoration: none;" href="Movies.php">Movies</a>
        </p>

        <section class="row">

          <?php

                    $ConnectingDB;

                    $sql = "SELECT * 
                            FROM movies
                            ORDER BY dateAdded desc 
                            LIMIT 0,3";
                    $stmt = $ConnectingDB->query($sql);

                    while ($DataRows = $stmt->fetch())
                    {
                        $MovieTitle = $DataRows["title"];
                        $MovieImage = $DataRows["mimage"];
                        $MovieSinopse = $DataRows["sinopse"];

                    ?>

                    <section class='col-lg-4 col-md-6 mb-4'>
                        <section class='card h-100'>
                            <a href='#'><img class='card-img-top'
                                    src='images/<?php echo htmlentities($MovieImage); ?>'></a>
                            <section class='card-body'>
                                <h4 class='card-title'>
                                    <a href='#' class='card-title'><?php echo htmlentities($MovieTitle); ?></a>
                                </h4>
                                <p class='card-text'>
                                  <?php
                                  if(strlen($MovieSinopse)>150) {
                                    $MovieSinopse = substr($MovieSinopse,0,150). "...";
                                  } 
                                  echo htmlentities($MovieSinopse); ?>
                                </p>
                            </section>
                            <section class='card-footer'>
                                <small class='text-muted'>&#9733; &#9733; &#9733; &#9734; &#9734;</small>
                            </section>
                        </section>
                    </section>

                    <?php
                                                     }?>

        </section>

        <p class="homepage-categoria">
          <a style="color: #ffffff; text-decoration: none;" href="Series.php">Series</a>
        </p>

        <section class="row">

          <?php

                    $ConnectingDB;

                    $sql = "SELECT * 
                            FROM series
                            ORDER BY dateAdded desc 
                            LIMIT 0,3";
                    $stmt = $ConnectingDB->query($sql);

                    while ($DataRows = $stmt->fetch())
                    {
                        $SerieTitle = $DataRows["title"];
                        $SerieImage = $DataRows["simage"];
                        $SerieSinopse = $DataRows["sinopse"];

                    ?>

                    <section class='col-lg-4 col-md-6 mb-4'>
                        <section class='card h-100'>
                            <a href='#'><img class='card-img-top'
                                    src='images/<?php echo htmlentities($SerieImage); ?>'></a>
                            <section class='card-body'>
                                <h4 class='card-title'>
                                    <a href='#' class='card-title'><?php echo htmlentities($SerieTitle); ?></a>
                                </h4>
                                <p class='card-text'>
                                    <?php
                                      if (strlen($SerieSinopse) > 150)
                                      {
                                        $SerieSinopse = substr($SerieSinopse, 0, 150) . "...";
                                      }
                                      echo htmlentities($SerieSinopse);
                                    ?>
                                </p>
                            </section>
                            <section class='card-footer'>
                                <small class='text-muted'>&#9733; &#9733; &#9733; &#9734; &#9734;</small>
                            </section>
                        </section>
                    </section>

                    <?php
                                                     }?>

          <!--Footer-->

          <?php require_once("Includes/footer.php"); ?>