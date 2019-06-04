<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
if (isset($_POST["Submit"]))
{
  $FirstName = $_POST["fName"];
  $LastName = $_POST["lName"];
  $Username = $_POST["Username"];  
  $Password = $_POST["Passw"];
  $Email = $_POST["Email"];
  $ConfirmPassword = $_POST["ConfirmPassw"];

  date_default_timezone_set("Europe/Lisbon");
  $CurrentTime = time();
  $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

  if (empty($Username) || 
      empty($FirstName) || 
      empty($LastName) || 
      empty($Password) || 
      empty($Email) ||
      empty($ConfirmPassword))
  {
    $_SESSION['ErrorMessage'] = "All fields must be filled out";
    Redirect_to("SignUp.php");
  }
  elseif (strlen($Password) < 6)
  {
    $_SESSION['ErrorMessage'] = "Password should be at least 6 characters";
    Redirect_to("SignUp.php");
  }
  elseif ($Password !== $ConfirmPassword)
  {
    $_SESSION['ErrorMessage'] = "Password and confirmation should match!";
    Redirect_to("SignUp.php");
  }
  elseif (CheckUsernameExistsOrNot($Username))
  {
    $_SESSION['ErrorMessage'] = "Username already exists, please try another one.";
    Redirect_to("SignUp.php");
  }
  else
  {
    //Query to insert new user in our DataBase
    $ConnectingDB;
    $sql = "INSERT INTO users(name, surname, username, passw, email, datetime)";
    $sql .= "VALUES(:fName, :lName, :userName, :password, :eMail, :dateTime)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':fName', $FirstName);
    $stmt->bindValue(':lName', $LastName);
    $stmt->bindValue(':userName', $Username);
    $stmt->bindValue(':password', $Password);
    $stmt->bindValue(':eMail', $Email);
    $stmt->bindValue(':dateTime', $DateTime);

    $Execute = $stmt->execute();

    if ($Execute)
    {
      $_SESSION["SuccessMessage"] = "Account created successfully";
      Redirect_to("index.php");
    }
    else
    {
      $_SESSION['ErrorMessage'] = "Something went wrong. Try Again!";
      Redirect_to("index.php");
    }
  }
} //Ending of Submit Button If-Condition
?>

<!DOCTYPE html>
<html>

<head>
  <title>Projeto Final TI 2 - Log In Form</title>
  <link href="css/css-projeto.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body style="margin: 0;">

  <section class="page-container">
    <section class="content-wrap">

      <section class="section-barra">
        <nav class="barra">
          <a class="brand-barra" href="index.php"><i class="fas fa-bolt" style="font-size: 20px; color: rgb(250, 188, 96)"></i> ThunderStream</a>
          <a class="link-barra" href="LogIn.php">Log In</a>
          <a class="link-barra" href="SignUp.php">Sign Up</a>
        </nav>
      </section>
      

      <section class="container">
          <!-- PHP SCOPE TO CALL FUNCITONS-->
          <?php
                   echo ErrorMessage();
                   echo SuccessMessage();
                   ?>
          <!--END OF PHP SCOPE-->
        
      <section style="padding: 45px 0; border-radius: 5px; background-color: rgb(218, 218, 218);">

        <p class="text-log-sign">Sign Up</p>

        <section class="section-log-sign">

          <form class="" action="" method="post">
            <p class="legend-log-sign">FIRST NAME <span style="color: red;">*</span> </p>
            <br>
            <input type="text" class="input-log-sign" name="fName" id="fName"  autofocus placeholder="John">
            <br>
            <p class="legend-log-sign">LAST NAME <span style="color: red;">*</span> </p>
            <br>
            <input type="text" class="input-log-sign" name="lName" id="lName"   placeholder="Snow">
            <br>
            <p class="legend-log-sign">USERNAME <span style="color: red;">*</span> </p>
            <br>
            <input type="text" class="input-log-sign" name="Username" id="Username" placeholder="john.snow.1876">
            <br>
            <p class="legend-log-sign">EMAIL <span style="color: red;">*</span> </p>
            <br>
            <input type="email" class="input-log-sign" name="Email" id="Email"  placeholder="john@snow.wf">
            <br>
            <p class="legend-log-sign">PASSWORD <span style="color: red;">*</span> </p>
            <br>
            <input type="password" class="input-log-sign" name="Passw" id="Passw" >
            <br>
            <p class="legend-log-sign">CONFIRM PASSWORD <span style="color: red;">*</span> </p>
            <br>
            <input type="password" class="input-log-sign" name="ConfirmPassw" id="ConfirmPassw" >
            <br>
            <input type="checkbox" name="terms" id="terms" required>
            <label for="terms">I accept the terms and want to proceed. <span style="color: red;">*</span> </label>

            <button type="submit" name="Submit" id="Submit" class="button-log-sign">Sign Up</button>
          </form>
        </section>
        
        
          <!--Footer-->
          <?php require_once("Includes/footer.php"); ?>
