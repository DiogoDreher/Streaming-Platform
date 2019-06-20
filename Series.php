<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>


<!DOCTYPE html>
<html>

<head>
    <title>Series</title>
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


                <p class="homepage-categoria">Series</p>

                <section class="row">

                    <?php

                    $ConnectingDB;

                    $sql = "SELECT * 
                            FROM series
                            ORDER BY dateAdded desc";
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