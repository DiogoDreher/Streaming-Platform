<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login(); ?>

<?php
//Fetching the existing Admin Data
$UserId = $_SESSION["UserId"];

//Updating

if (isset($_POST["Submit"]))
{
    $Password = $_POST['Passw'];
    $ConfirmPassword = $_POST['ConfirmPassw'];
    $Image = $_FILES["Image"]["name"];
    $Target = "uploads/" . basename($_FILES["Image"]["name"]);


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
    <title>Edit Profile</title>
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