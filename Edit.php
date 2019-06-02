<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login(); ?>

<?php
//Fetching the existing Admin Data
$UserId = $_SESSION["UserId"];
// global $ConnectingDB;
// $sql = "SELECT * FROM users WHERE id='$UserId'";
// $stmt = $ConnectingDB->query($sql);
// while ($DataRows = $stmt->fetch())
// {
//     $ExistingUsername = $DataRows["username"];
//     $ExistingEmail = $DataRows["email"];
// }

//Updating

if (isset($_POST["Submit"]))
{
    $Password = $_POST['Passw'];
    $ConfirmPassword = $_POST['ConfirmPassw'];
    $Image = $_FILES["Image"]["name"];
    $Target = "Images/" . basename($_FILES["Image"]["name"]);


    $ConnectingDB;
    if (!empty($Password))
    {

        if (strlen($Password) < 6)
        {
            $_SESSION['ErrorMessage'] = "Password should be at least 6 characters";
            Redirect_to("Edit.php");
        }
        elseif ($Password !== $ConfirmPassword)
        {
            $_SESSION['ErrorMessage'] = "Password and confirmation should match!";
            Redirect_to("Edit.php");
        }
        
        elseif (!empty($Image))
        {
            $sql = "UPDATE users
                    SET  passw='$Password', userimage='$Image'
                    WHERE id='$UserId'";
        }
        else
        {
            $sql = "UPDATE users
                    SET  passw='$Password'
                    WHERE id='$UserId'";
        }
    }
    else
    {
        if (!empty($Image))
        {
            $sql = "UPDATE users
                    SET   userimage='$Image'
                    WHERE id='$UserId'";
        }
        else
        {
            $_SESSION["SuccessMessage"] = "Nothing Has Been Altered!";
            Redirect_to("MyProfile.php");
        }
       
    }



    $Execute = $ConnectingDB->query($sql);
    move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
    //
    //var_dump($Execute);

    if ($Execute)
    {
        $_SESSION["SuccessMessage"] = "Profile Updated Successfully";
        Redirect_to("MyProfile.php");
    }
    else
    {
        $_SESSION['ErrorMessage'] = "Something went wrong. Try Again!";
        Redirect_to("MyProfile.php");
    }
}
//Ending of Submit Button If-Condition
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
    <link href="bootstrap.css" rel="stylesheet">
</head>

<body style="margin-top: 0;">

    <section class="section-barra">
        <nav class="barra">
            <a class="brand-barra" href="index.php"><i class="fas fa-bolt"
                    style="font-size: 20px; color: rgb(250, 188, 96)"></i> ThunderStream</a>
            <a class='link-barra' href='LogOut.php'>Log Out</a>
            <a class='link-barra' href='MyProfile.php'>My Profile</a>
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

                <section style="padding: 45px 0; border-radius: 5px; background-color: rgb(218, 218, 218);">

                    <p class="text-log-sign">Edit Profile</p>

                    <section class="section-log-sign">

                        <div class="" style="">
                            <form class="" action="Edit.php" method="post" enctype="multipart/form-data">


                                <p class="legend-log-sign">NEW PASSWORD </p>
                                <br>
                                <input type="password" class="input-log-sign" name="Passw" id="Passw" autocomplete="">
                                <br>
                                <p class="legend-log-sign">CONFIRM PASSWORD </p>
                                <br>
                                <input type="password" class="input-log-sign" name="ConfirmPassw" id="ConfirmPassw"
                                    autocomplete="">
                                <br>
                                <p class="legend-log-sign">SELECT IMAGE</p>
                                <br>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input class="custom-file-input" type="File" name="Image" id="imageSelect"
                                            value="">
                                        <label for="imageSelect" class="custom-file-label">Select Image</label>
                                    </div>
                                </div>
                                <br> 
                                <button type="submit" name="Submit" id="Submit" class="button-log-sign">EDIT</button>
                            </form>
                        </div>
                    </section>
                </section>


                <!--Footer-->

                <?php require_once("Includes/footer.php"); ?>