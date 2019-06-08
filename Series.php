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