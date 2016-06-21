<?php
    require_once("common.inc.php"); 

    function isAuth() 
    {
        if (isset($_SESSION["is_auth"])) 
        {
            return $_SESSION["is_auth"];
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
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["userID"] = getUserID($email, $password);
            return true;
        }
        else 
        {
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }

    function getLogin() 
    {                                 
        if (isAuth()) 
        {
            return $_SESSION["email"];
        }
    }

    function logOut()
    {
        $_SESSION = array();
        $_SESSION["is_auth"] = false;
        session_destroy();
    }