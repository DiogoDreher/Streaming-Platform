<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php Confirm_Login(); ?>

<?php $MovieId = $_GET["id"];
      $UserId = $_SESSION["UserId"];


    //Query to favorite or unfavorite the movie
    
        
        date_default_timezone_set("Europe/Lisbon");
        $CurrentTime = time();
        $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

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
    

?>