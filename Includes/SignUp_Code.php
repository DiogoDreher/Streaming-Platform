<?php require_once("DB.php"); ?>
<?php require_once("Functions.php"); ?>
<?php require_once("Sessions.php"); ?>
<?php
if (isset($_POST["Submit"]))
{
    $FirstName = $_POST["fName"];
    $LastName = $_POST["lName"];
    $Username = $_POST["Username"];
    $Password = $_POST["Passw"];
    $Email=Test_User_Input($_POST["Email"]);
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
    elseif (!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $email)) {
      $_SESSION['ErrorMessage'] = "Invalid e-mail format.";
        Redirect_to("SignUp.php");
    }    
    elseif (CheckUsernameExistsOrNot($Username))
    {
        $_SESSION['ErrorMessage'] = "Username already exists, please try another one.";
        Redirect_to("SignUp.php");
    }
    elseif (CheckEmailExistsOrNot($Email))
    {
        $_SESSION['ErrorMessage'] = "There is already an account associated to this e-mail address. Try recovering your password.";
        Redirect_to("ChkEmail.php");
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