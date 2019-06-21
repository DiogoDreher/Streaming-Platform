<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php $MovieId = $_GET["id"];
    if (isset($_SESSION["UserId"]))
    {
        $UserId = $_SESSION["UserId"];
        //Query to see if movie is already favorite or not

         $ConnectingDB;

        $sql = "SELECT *
                FROM favorites_movies
                WHERE movies_id='$MovieId' AND users_id='$UserId'";
        $stmt = $ConnectingDB->query($sql);
        $DataRows = $stmt->fetch();

        
        //var_dump($DataRows);       
        
        
        if ($DataRows == false) {
            $FavBtn = "Favorite";
         } else {
            $FavBtn = "Unfavorite";    
         }
         
    } else {
            $FavBtn = "Favorite";
    }
      

    //Query to fetch Movie's info given its id
    $ConnectingDB;

    $sql = "SELECT * 
            FROM movies
            WHERE id='$MovieId'";;
    $stmt = $ConnectingDB->query($sql);

    while ($DataRows = $stmt->fetch())
    {
        $MovieTitle = $DataRows["title"];
        $MovieGenre = $DataRows["genre"];
        $MovieProd = $DataRows["prod"];
        $MovieYear = $DataRows["year_launch"];
        $MovieImage = $DataRows["mimage"];
        $MovieSinopse = $DataRows["sinopse"];
    }

    


    

?>
