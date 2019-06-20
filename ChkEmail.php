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
  $Email = $_POST["Email"];
  if (empty($Email))
  {
    $_SESSION["ErrorMessage"] = "All fields must be filled out!";
    Redirect_to("ChkEmail.php");
  }
  else
  {
    // CHECK EMAIL FROM DATABASE
    $Found_Email = CheckEmailExistsOrNot($Email);
    if ($Found_Email)
    {
      Redirect_to("ResetPass.php?email=" . $Email);
    }
      else
      {
        $_SESSION["ErrorMessage"] = "Email not valid, try again!";
        Redirect_to("ChkEmail.php");
      }
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

        <p class="text-log-sign">Enter Email</p>

        <section class="section-log-sign">
          <form class="" action="" method="post">
            <p class="legend-log-sign"> EMAIL </p>
            <br>
            <input type="text" class="input-log-sign" name="Email" id="email" autofocus>
            <br>

            <button type="submit" name="Submit" class="button-log-sign">Reset Password</button>
          </form>
        </section>
      

        <!--Footer-->
       <?php require_once("Includes/footer.php"); ?>