<?php require_once("Movie_Code.php"); ?>

<!DOCTYPE html>
<html>

    <head>
        <title><?php echo htmlentities($MovieTitle); ?></title>
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

                <section class="movie_individual">
                    <section style="padding: 15px 0; background-color: rgba(0, 0, 0, 0.75);">
                        <p class="movie_title"><?php echo htmlentities($MovieTitle); ?></p>
                    </section>
                      <section class="row" style="min-height: 650px;">
                        <section class="col-lg-4 col-md-6 mb-4" style="padding: 0; margin-left: 2rem; margin-top: 1rem;">
                            <img class="movie_image" src="images/<?php echo htmlentities($MovieImage); ?>">
                            <a href='WatchTrailer.php?id=<?php echo htmlentities($MovieId); ?>'><button type="button" class="movie_trailer">Trailer</button></a>

                            <a href="fav.php?id=<?php echo htmlentities($MovieId); ?>">
                            <button type="button" name="Favorite"  class="
                            <?php 
                                if (isset($_SESSION["UserId"])) {
                                    echo 'movie_fav';
                                } else {
                                    echo 'movie_disabled';
                                }
                            ?>"><?php echo htmlentities($FavBtn); ?></button></a>

                            <a href='WatchMovie.php?id=<?php echo htmlentities($MovieId); ?>'><button type="button" class="
                            <?php 
                                if (isset($_SESSION["UserId"])) {
                                    echo 'movie_play';
                                } else {
                                    echo 'movie_disabled';
                                }
                            ?>">Play</button></a>   
                            
                            
                            <a href='Movies.php'><button type="button" class="movie_back"> Back to Movies</button></a>
                        </section>
                        <section class="col-lg-7 col-md-9 mb-4" style="padding: 0; margin-left: 15px; margin-top: .75rem">
                            <br>
                            <h4>Sinopse:</h4>
                            <p class="movie_text"> <?php echo htmlentities($MovieSinopse); ?></p>
                            <br><br>
                            <p class="movie_text"><b>Producer:</b> <?php echo htmlentities($MovieProd); ?></p>
                            <br>
                            <p class="movie_text"><b>Genre:</b> <?php echo htmlentities($MovieGenre); ?></p>
                            <br>
                            <p class="movie_text"><b>Year:</b> <?php echo htmlentities($MovieYear); ?> </p>
                            <!--<p class="movie_text"><b>Texto:</b> Texto</p>--> 
                        </section>
                      </section>
                <!--Footer-->

          <?php require_once("Includes/footer.php"); ?>

    </body>

</html>