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
    <title>Favorite Series</title>
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


                <p class="homepage-categoria"><?php echo htmlentities($ExistingName); ?>'s Favorite Series</p>

                <section class="row">

                    <?php

                    $ConnectingDB;

                    $sql = "SELECT * 
                FROM favorites_series
                LEFT JOIN series ON (series.id = favorites_series.series_id)
                WHERE (favorites_series.users_id='$UserId') 
                ORDER BY favDate desc";

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
                                        if(strlen($SerieSinopse)>150) {
                                            $SerieSinopse = substr($SerieSinopse,0,150). "...";
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