<?php
    require_once("include/common.inc.php");

    $email = dbQuote($_POST["email"]);
    $password = dbQuote($_POST["password"]);

    if (checkPass($email, $password))
    {
        auth($email, $password);
    }

    header("Location: ../index.php");