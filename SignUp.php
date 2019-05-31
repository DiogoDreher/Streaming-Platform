<!DOCTYPE html>
<html>

<head>
  <title>Projeto Final TI 2 - Log In Form</title>
  <link href="css/css-projeto.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="bootstrap.css" rel="stylesheet">
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

      <section class="container" style="padding: 45px 0; border-radius: 5px; background-color: rgb(218, 218, 218);">

        <p class="text-log-sign">Sign Up</p>

        <section class="section-log-sign">

          <form class="" action="" method="post">
            <p class="legend-log-sign">FULL NAME <span style="color: red;">*</span> </p>
            <br>
            <input type="text" class="input-log-sign" required autofocus placeholder="John Snow">
            <br>
            <p class="legend-log-sign">USERNAME <span style="color: red;">*</span> </p>
            <br>
            <input type="text" class="input-log-sign" required placeholder="john.snow.1876">
            <br>
            <p class="legend-log-sign">EMAIL <span style="color: red;">*</span> </p>
            <br>
            <input type="email" class="input-log-sign" required placeholder="john@snow.wf">
            <br>
            <p class="legend-log-sign">PASSWORD <span style="color: red;">*</span> </p>
            <br>
            <input type="password" class="input-log-sign" required>
            <br>
            <p class="legend-log-sign">CONFIRM PASSWORD <span style="color: red;">*</span> </p>
            <br>
            <input type="password" class="input-log-sign" required>
            <br>
            <input type="checkbox" name="terms" id="terms" required>
            <label for="terms">I accept the terms and want to proceed. <span style="color: red;">*</span> </label>

            <button type="submit" class="button-log-sign">Sign Up</button>
          </form>
        
        
          <!--Footer-->
          <?php require_once("Includes/footer.php"); ?>
