<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>

<!DOCTYPE html>
<html>

<head>
  <title>Thunder Stream</title>
  
  <!--Header-->
  <?php require_once("Includes/header.php"); ?>
  <!--End Header-->

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
                        $MovieId = $DataRows["id"];
                        $MovieTitle = $DataRows["title"];
                        $MovieImage = $DataRows["mimage"];
                        $MovieSinopse = $DataRows["sinopse"];

                    ?>

                    <section class='col-lg-4 col-md-6 mb-4'>
                        <section class='card h-100'>
                            <a href='Movie.php?id=<?php echo htmlentities($MovieId); ?>'><img class='card-img-top'
                                    src='images/<?php echo htmlentities($MovieImage); ?>'></a>
                            <section class='card-body'>
                                <h4 class='card-title'>
                                    <a href='Movie.php?id=<?php echo htmlentities($MovieId); ?>' class='card-title'><?php echo htmlentities($MovieTitle); ?></a>
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