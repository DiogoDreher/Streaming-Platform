<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php $SerieId = $_GET["id"];
    if (isset($_SESSION["UserId"]))
    {
        $UserId = $_SESSION["UserId"];
        //Query to see if serie is already favorite or not

         $ConnectingDB;

        $sql = "SELECT *
                FROM favorites_series
                WHERE series_id='$SerieId' AND users_id='$UserId'";
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
      

    //Query to fetch Serie's info given its id
    $ConnectingDB;

    $sql = "SELECT * 
            FROM series
            WHERE id='$SerieId'";;
    $stmt = $ConnectingDB->query($sql);

    while ($DataRows = $stmt->fetch())
    {
        $SerieTitle = $DataRows["title"];
        $SerieGenre = $DataRows["genre"];
        $SerieProd = $DataRows["prod"];
        $SerieYear = $DataRows["year_launch"];
        $SerieEnd = $DataRows['year_end'];
        $SerieSeasons = $DataRows['season'];
        $SerieImage = $DataRows["simage"];
        $SerieSinopse = $DataRows["sinopse"];
    }

    


    

?>
