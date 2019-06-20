<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login(); ?>

<?php
//Fetching the existing Admin Data
$UserId = $_SESSION["UserId"];
global $ConnectingDB;
$sql = "SELECT * FROM users WHERE id='$UserId'";
$stmt = $ConnectingDB->query($sql);
while ($DataRows = $stmt->fetch())
{
    $ExistingName = $DataRows["name"];
}
     
?>

<!DOCTYPE html>
<html>

<head>
    <title>Favorite Movies</title>
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

                
                <p class="homepage-categoria"><?php echo htmlentities($ExistingName);?>'s Favorite Movies</p>

                <section class="row">

                    <?php

                $ConnectingDB;

                $sql = "SELECT * 
                FROM favorites_movies
                LEFT JOIN movies ON (movies.id = favorites_movies.movies_id)
                WHERE (favorites_movies.users_id='$UserId') 
                ORDER BY favDate desc";
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
                                        echo htmlentities($MovieSinopse); 
                                    ?>
                                </p>
                            </section>
                            <section class='card-footer'>
                                <small class='text-muted'>&#9733; &#9733; &#9733; &#9734; &#9734;</small>
                            </section>
                        </section>
                    </section>

                    <?php } ?>

                



                    <!--Footer-->

                    <?php require_once("Includes/footer.php"); ?>