<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
if (isset($_SESSION["UserId"]))
{
  Redirect_to("MyProfile.php");
}
if (isset($_POST["Submit"]))
{
    $Password = $_POST['Passw'];
    $ConfirmPassword = $_POST['ConfirmPassw'];    
    $Email = $_GET['email'];

    $ConnectingDB;
    if (!empty($Password))
    {

        if (strlen($Password) < 6)
        {
            $_SESSION['ErrorMessage'] = "Password should be at least 6 characters";
            Redirect_to("ResetPass.php");
        }
        elseif ($Password !== $ConfirmPassword)
        {
            $_SESSION['ErrorMessage'] = "Password and confirmation should match!";
            Redirect_to("ResetPass.php");
        }        
        
        else
        {
            $sql = "UPDATE users
                    SET  passw='$Password'
                    WHERE email='$Email'";
        }
    }
    else
    {
        
            $_SESSION["ErrorMessage"] = "Please enter your new password!";
            Redirect_to("ResetPass.php");
        
       
    }



    $Execute = $ConnectingDB->query($sql);
    //
    //var_dump($Execute);

    if ($Execute)
    {
        $_SESSION["SuccessMessage"] = "Password Reseted Successfully";
        Redirect_to("Login.php");
    }
    else
    {
        $_SESSION['ErrorMessage'] = "Something went wrong. Try Again!";
        Redirect_to("MyProfile.php");
    }
}
  

?>

<!DOCTYPE html>
<html>

<head>
  <title>Reset Password</title>
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

        <p class="text-log-sign">Reset Password</p>

        <section class="section-log-sign">
          <form class="" action="" method="post">
            <p class="legend-log-sign">NEW PASSWORD </p>
            <br>
            <input type="password" class="input-log-sign" name="Passw" id="Passw" autocomplete="">
            <br>
            <p class="legend-log-sign">CONFIRM PASSWORD </p>
            <br>
            <input type="password" class="input-log-sign" name="ConfirmPassw" id="ConfirmPassw" autocomplete="">
            <br>

            <button type="submit" name="Submit" class="button-log-sign">Reset Password</button>
          </form>
        </section>
      

        <!--Footer-->
       <?php require_once("Includes/footer.php"); ?>