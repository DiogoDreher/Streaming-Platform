<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php

function Test_User_Input($data){
  return $data;
}

function Redirect_to($New_Location)
{
    header("Location:" . $New_Location);
    exit;
}

function CheckUsernameExistsOrNot($Username)
{
    global $ConnectingDB;
    $sql = "SELECT username FROM users WHERE username=:userName";
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

function CheckEmailExistsOrNot($Email)
{
    global $ConnectingDB;
    $sql = "SELECT email FROM users WHERE email=:eMail";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':eMail', $Email);
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
    $sql = "SELECT * FROM users WHERE username =:userName OR email=:userName AND passw =:passWord LIMIT 1";
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

function Find_Movies($UserId) {
    
        global $ConnectingDB;
        $sql = "SELECT * FROM favorites_movies WHERE users_id='$UserId'";
        $stmt = $ConnectingDB->query($sql);
        while ($DataRows = $stmt->fetch())
        {
        $Movies = $DataRows["movies_id"];
        }
    
        $sql = "SELECT * FROM movies WHERE id='$Movies'";
        $stmt = $ConnectingDB->query($sql);
        while ($DataRows = $stmt->fetch())
        {
            $MovieTitle = $DataRows["title"];
            $MovieImage = $DataRows["mimage"];
            $MovieSinopse = $DataRows["sinopse"];
        }
        echo $MovieTitle;
}

?>