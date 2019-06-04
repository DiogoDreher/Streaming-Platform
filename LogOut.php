<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
$_SESSION["UserId"] = null;
$_SESSION["Username"] = null;
session_destroy();
Redirect_to("index.php");
?>