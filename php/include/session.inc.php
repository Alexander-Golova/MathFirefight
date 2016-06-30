<?php
    require_once("common.inc.php");

    function isAuth() 
    {
        if (isset($_SESSION["is_auth"])) 
        {
            if ($_SESSION["is_auth"])
            {
                $userId = getUserIdByUserEmail($_SESSION["email"]);
                dbQuery("UPDATE user SET last_authentification = NOW() WHERE user_id = {$userId}");
                return true;
            }
        }
        else 
        {
            return false;
        }
    }

    function auth($email, $password) 
    {
        if (checkPass($email, $password))
        {
            $_SESSION["is_auth"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["userId"] = getUserIdByUserEmail($email);
            return true;
        }
        else 
        {
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }

    function logOut()
    {
        $_SESSION = array();
        $_SESSION["is_auth"] = false;
        $_SESSION["email"] = "";
        session_destroy();
    }
