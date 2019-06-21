<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php Confirm_Login(); ?>

<?php 
      $UserId = $_SESSION["UserId"];

      if (isset($_GET['id'])) {
        $MovieId = $_GET["id"];

        //Query to favorite or unfavorite the movie

        $ConnectingDB;

        $sql = "SELECT *
                FROM favorites_movies
                WHERE movies_id='$MovieId' AND users_id='$UserId'";
        $stmt = $ConnectingDB->query($sql);
        $DataRows = $stmt->fetch();

        
        //var_dump($DataRows);       
        
        
        if ($DataRows == false) {
            $sql = "INSERT INTO favorites_movies(users_id, movies_id)";
            $sql .= "VALUES(:idUser, :idMovie)";
            $stmt = $ConnectingDB->prepare($sql);
            $stmt->bindValue(':idUser', $UserId);
            $stmt->bindValue(':idMovie', $MovieId);

            $Execute = $stmt->execute();

            if ($Execute) {
                $_SESSION["SuccessMessage"]="Movie added to your favorites successfully!";
                Redirect_to("Movie.php?id=" . $MovieId);
            } else {
                $_SESSION["ErrorMessage"]="Something went wrong :(";
                Redirect_to("Movie.php?id=" . $MovieId);
            }
         } else {
                $ConnectingDB;
                $sql = "DELETE FROM favorites_movies WHERE movies_id='$MovieId' AND users_id='$UserId'";
                $Execute = $ConnectingDB->query($sql);

                //var_dump($Execute);

                if ($Execute) {
                    $_SESSION["SuccessMessage"] = "Movie Removed Successfully!";
                    Redirect_to("Movie.php?id=" . $MovieId);
                } else {
                    $_SESSION["ErrorMessage"] = "Something went wrong, try again!";
                    Redirect_to("Movie.php?id=" . $MovieId);
                }


         }
      } elseif (isset($_GET['SerieId'])) {
           $SerieId = $_GET["SerieId"];

            //Query to favorite or unfavorite the serie

            $ConnectingDB;

            $sql = "SELECT *
                    FROM favorites_series
                    WHERE series_id='$SerieId' AND users_id='$UserId'";
            $stmt = $ConnectingDB->query($sql);
            $DataRows = $stmt->fetch();

            
            //var_dump($DataRows);       
            
            
            if ($DataRows == false) {
                $sql = "INSERT INTO favorites_series(users_id, series_id)";
                $sql .= "VALUES(:idUser, :idSerie)";
                $stmt = $ConnectingDB->prepare($sql);
                $stmt->bindValue(':idUser', $UserId);
                $stmt->bindValue(':idSerie', $SerieId);

                $Execute = $stmt->execute();

                if ($Execute) {
                    $_SESSION["SuccessMessage"]="Serie added to your favorites successfully!";
                    Redirect_to("Serie.php?id=" . $SerieId);
                } else {
                    $_SESSION["ErrorMessage"]="Something went wrong :(";
                    Redirect_to("Serie.php?id=" . $SerieId);
                }
            } else {
                    $ConnectingDB;
                    $sql = "DELETE FROM favorites_series WHERE series_id='$SerieId' AND users_id='$UserId'";
                    $Execute = $ConnectingDB->query($sql);

                    //var_dump($Execute);

                    if ($Execute) {
                        $_SESSION["SuccessMessage"] = "Serie Removed Successfully!";
                        Redirect_to("Serie.php?id=" . $SerieId);
                    } else {
                        $_SESSION["ErrorMessage"] = "Something went wrong, try again!";
                        Redirect_to("Serie.php?id=" . $SerieId);
                    }


            }
      }


    
    

?>