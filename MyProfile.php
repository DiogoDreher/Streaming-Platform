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
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo htmlentities($ExistingName); ?>'s Profile</title>
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

                <section id="Profile" name="Profile" >
                <div class="row">
                    <!-- LEFT AREA-->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-dark text-light text-center">
                                <h3><?php echo htmlentities($ExistingName); ?></h3>
                            </div>
                            <div class="card-body">
                                <img src="uploads/<?php echo $ExistingImage; ?>" class="rounded-circle mx-auto d-block" style="max-width: 120px ;max-height: 150px ; ">
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
                

                <p class="homepage-categoria">
                    <a style="color: #ffffff; text-decoration: none;" href="FavMovies.php">Favorite Movies</a> 
                </p>

                <section class="row">

                <?php  

                $ConnectingDB;

                $sql = "SELECT * 
                FROM favorites_movies
                LEFT JOIN movies ON (movies.id = favorites_movies.movies_id)
                WHERE (favorites_movies.users_id='$UserId') 
                ORDER BY favDate desc 
                LIMIT 0,3";
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
                        <a href='Movie.php?id=<?php echo htmlentities($MovieId); ?>'><img class='card-img-top' src='images/<?php echo htmlentities($MovieImage);?>'></a>
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
                    

                </section>

                <p class="homepage-categoria">
                    <a style="color: #ffffff; text-decoration: none;" href="FavSeries.php">Favorite Series</a>
                </p>

                <section class="row">

                    <?php  

                $ConnectingDB;

                $sql = "SELECT * 
                FROM favorites_series
                LEFT JOIN series ON (series.id = favorites_series.series_id)
                WHERE (favorites_series.users_id='$UserId') 
                ORDER BY favDate desc 
                LIMIT 0,3";
                $stmt = $ConnectingDB->query($sql);

                while ($DataRows = $stmt->fetch())
                {
                    $SerieId = $DataRows['id'];
                    $SerieTitle = $DataRows["title"];
                    $SerieImage = $DataRows["simage"];
                    $SerieSinopse = $DataRows["sinopse"];

                ?>
                
                <section class='col-lg-4 col-md-6 mb-4'>
                    <section class='card h-100'>
                        <a href='Serie.php?id=<?php echo htmlentities($SerieId); ?>'><img class='card-img-top' src='images/<?php echo htmlentities($SerieImage);?>'></a>
                        <section class='card-body'>
                            <h4 class='card-title'>
                                <a href='Serie.php?id=<?php echo htmlentities($SerieId); ?>' class='card-title'><?php echo htmlentities($SerieTitle); ?></a>
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

                <?php } ?>

                    

                    <!--Footer-->

                    <?php require_once("Includes/footer.php"); ?>