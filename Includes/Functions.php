<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php

function Redirect_to($New_Location)
{
    header("Location:" . $New_Location);
    exit;
}

function CheckUsernameExistsOrNot($Username)
{
    global $ConnectingDB;
    $sql = "SELECT username FROM admins WHERE username=:userName";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userName', $Username);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if ($Result == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function Login_Attempt($Username, $Password)
{
    global $ConnectingDB;
    $sql = "SELECT * FROM users WHERE username =:userName AND passw =:passWord LIMIT 1";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userName', $Username);
    $stmt->bindValue(':passWord', $Password);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if ($Result == 1)
    {
        return $Found_Account = $stmt->fetch();
    }
    else
    {
        return null;
    }
}

function Confirm_Login()
{
    if (isset($_SESSION["UserId"]))
    {
        return true;
    }
    else
    {
        $_SESSION["ErrorMessage"] = "Login Required!";
        Redirect_to("Login.php");
    }
}

?>