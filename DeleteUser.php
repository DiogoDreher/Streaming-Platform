<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
if (isset($_SESSION["UserId"]))
{
    $SearchQueryParameter = $_SESSION["UserId"];
    $ConnectingDB;
    $sql = "DELETE FROM users WHERE id='$SearchQueryParameter'";
    $Execute = $ConnectingDB->query($sql);

    //var_dump($Execute);

    if ($Execute)
    {
        $_SESSION["SuccessMessage"] = "Account Deleted Successfully!";
        Redirect_to('LogOut.php');
    }
    else
    {
        $_SESSION["ErrorMessage"] = "Something went wrong, try again!";
        Redirect_to('index.php');
    }
}
?>