<?php require_once("Includes/SignUp_Code.php"); ?>

<!DOCTYPE html>
<html>

<head>
  <title>Sign Up</title>
  <!--Header-->
  <?php require_once("Includes/header.php"); ?>
  <!--End Header-->
      

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
