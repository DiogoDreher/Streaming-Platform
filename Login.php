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
  $Username = $_POST["Username"];
  $Password = $_POST["Password"];
  if (empty($Username) || empty($Password))
  {
    $_SESSION["ErrorMessage"] = "All fields must be filled out!";
    Redirect_to("Login.php");
  }
  else
  {
    // CHECK USERNAME AND PASSWORD FROM DATABASE
    $Found_Account = Login_Attempt($Username, $Password);
    if ($Found_Account)
    {
      $_SESSION["UserId"] = $Found_Account["id"];
      $_SESSION["Username"] = $Found_Account["username"];
      $_SESSION["Name"] = $Found_Account["name"];
      $_SESSION["Surname"] = $Found_Account["surname"];
      $_SESSION["SuccessMessage"] = "Welcome " . $_SESSION["Name"] . " " . $_SESSION["Surname"] . "!";
      if (isset($_SESSION["TrackingURL"]))
      {
        Redirect_to($_SESSION["TrackingURL"]);
      }
      else
      {
        Redirect_to("index.php");
      }
    }
    else
    {
      $_SESSION["ErrorMessage"] = "Incorrect Username/Password";
      Redirect_to("Login.php");
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
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

        <p class="text-log-sign">Log In</p>

        <section class="section-log-sign">
          <form class="" action="" method="post">
            <p class="legend-log-sign">USERNAME OR EMAIL <span style="color: red;">*</span> </p>
            <br>
            <input type="text" class="input-log-sign" name="Username" id="username" autofocus>
            <br>
            <p class="legend-log-sign">PASSWORD <span style="color: red;">*</span> </p>
            <br>
            <input type="password" class="input-log-sign" name="Password" id="password">
            <br>
            <a href="ChkEmail.php" class="forgot-password">Forgot password?</a>

            <button type="submit" name="Submit" class="button-log-sign">Log In</button>
          </form>
        </section>
      

        <!--Footer-->
       <?php require_once("Includes/footer.php"); ?>