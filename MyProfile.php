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
    $ExistingSurname = $DataRows["surname"];
    $ExistingUsername = $DataRows["username"];
    $ExistingEmail = $DataRows["email"];
    $ExistingImage = $DataRows["userimage"];
}

// $sql = "SELECT favorites_movies.users_id, 
//                favorites_movies.movies_id, 
//                movies.title, 
//                movies.mimage, 
//                movies.sinopse 
//         FROM favorites_movies
//         LEFT JOIN movies ON (movies.id = favorites_movies.movies_id)
//         WHERE (favorites_movies.users_id='$UserId')";
//         $stmt = $ConnectingDB->query($sql);
//         $DataRows = $stmt->fetch();      
        
//             for ($i = 0; $i < count($DataRows); $i++) {
//                     $Movie = ['title' => array($i => $DataRows["title"]),
//                               'mimage' => array($i => $DataRows["mimage"]),
//                               'sinopse' => array($i => $DataRows["sinopse"])
//         ];
//             }

        

       
            
        

// $sql = "SELECT movies.title AS 'title', 
//                movies.mimage AS 'mImage', 
//                movies.sinopse AS 'sinopse' 
//         FROM favorites_movies, movies
//         WHERE ('$UserId' = favorites_movies.users_id)
//         AND (favorites_movies.movies_id = movies.id)";
//         $stmt = $ConnectingDB->query($sql);
//         while( $DataRows = $stmt->fetch()){       
        
//             $MovieTitle = $DataRows["title"];
//             $MovieImage = $DataRows["mImage"];
//             $MovieSinopse = $DataRows["sinopse"];

//             echo $MovieTitle . "<br>";
//             echo $MovieImage . "<br>";    
//             echo $MovieSinopse  . "<br>";
    

// }

        // for ($i = 0; $i < count($Movie); $i++){
                
        // echo $Movie['title'][$i];
        // echo $Movie['mimage'][$i];
        // echo $Movie['sinopse'][$i];
        // }
?>

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
            <a class="link-barra" href="LogOut.php">Log Out</a>
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

                <section id="Profile" name="Profile" >
                <div class="row">
                    <!-- LEFT AREA-->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-dark text-light text-center">
                                <h3><?php echo htmlentities($ExistingName); ?></h3>
                            </div>
                            <div class="card-body">
                                <img src="images/<?php echo $ExistingImage; ?>" class="rounded-circle mx-auto d-block" style="max-width: 120px ;max-height: 150px ; ">
                                <div class="text-center mt-2">
                                    <a href="Edit.php">Edit Profile</a> <br>
                                    <a href="DeleteUser.php">Delete Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- LEFT AREA END-->
                
                    <!-- RIGHT AREA-->
                    <div class="col-md-9" style="min-height:400px;">
                        <div class="card">
                            <div class="card-header bg-dark text-light text-center">
                                <h3>My Profile</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Name:</strong> <?php echo htmlentities($ExistingName . " " . $ExistingSurname); ?></p>
                                <p><strong>Username:</strong> <?php echo htmlentities($ExistingUsername); ?></p>
                                <p><strong>Email:</strong> <?php echo htmlentities($ExistingEmail); ?></p>
                            </div>
                        
                    </div>
                </div>
                </section>
                

                <p class="homepage-categoria">Favorite Movies</p>

                <section class="row">

                <?php  

                $ConnectingDB;

                $sql = "SELECT * 
                FROM favorites_movies
                LEFT JOIN movies ON (movies.id = favorites_movies.movies_id)
                WHERE (favorites_movies.users_id='$UserId') 
                ORDER BY favDate asc 
                LIMIT 0,3";
                $stmt = $ConnectingDB->query($sql);

                while ($DataRows = $stmt->fetch())
                {
                    $MovieTitle = $DataRows["title"];
                    $MovieImage = $DataRows["mimage"];
                    $MovieSinopse = $DataRows["sinopse"];

                ?>
                
                <section class='col-lg-4 col-md-6 mb-4'>
                    <section class='card h-100'>
                        <a href='#'><img class='card-img-top' src='images/<?php echo htmlentities($MovieImage);?>'></a>
                        <section class='card-body'>
                            <h4 class='card-title'>
                                <a href='#' class='card-title'><?php echo htmlentities($MovieTitle); ?></a>
                            </h4>
                            <p class='card-text'><?php echo htmlentities($MovieSinopse); ?></p>
                        </section>
                        <section class='card-footer'>
                            <small class='text-muted'>&#9733; &#9733; &#9733; &#9734; &#9734;</small>
                        </section>
                    </section>
                </section>

                <?php } ?>
                    

                </section>

                <p class="homepage-categoria">Favorite Series</p>

                <section class="row">

                    <?php  

                $ConnectingDB;

                $sql = "SELECT * 
                FROM favorites_series
                LEFT JOIN series ON (series.id = favorites_series.series_id)
                WHERE (favorites_series.users_id='$UserId') 
                ORDER BY favDate asc 
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
                        <a href='#'><img class='card-img-top' src='images/<?php echo htmlentities($SerieImage);?>'></a>
                        <section class='card-body'>
                            <h4 class='card-title'>
                                <a href='#' class='card-title'><?php echo htmlentities($SerieTitle); ?></a>
                            </h4>
                            <p class='card-text'><?php echo htmlentities($SerieSinopse); ?></p>
                        </section>
                        <section class='card-footer'>
                            <small class='text-muted'>&#9733; &#9733; &#9733; &#9734; &#9734;</small>
                        </section>
                    </section>
                </section>

                <?php } ?>

                    

                    <!--Footer-->

                    <?php require_once("Includes/footer.php"); ?>