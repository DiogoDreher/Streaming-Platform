<?php
session_start();

function ErrorMessage()
{
    if (isset($_SESSION['ErrorMessage']))
    {
        $Output = "<section class='alert alert-danger' style='text-align: center;'>";
        $Output .= htmlentities($_SESSION["ErrorMessage"]);
        $Output .= "</section>";
        $_SESSION["ErrorMessage"] = null;
        return $Output;
    }
}

function SuccessMessage()
{
    if (isset($_SESSION['SuccessMessage']))
    {
        $Output = "<section class='alert alert-success' style='text-align: center;'>";
        $Output .= htmlentities($_SESSION["SuccessMessage"]);
        $Output .= "</section>";
        $_SESSION["SuccessMessage"] = null;
        return $Output;
    }
}
?>