<?php
    require_once("php/include/common.inc.php");
    require_once("libs/Smarty.class.php");
    $smarty = new Smarty();

    $users = getUsers();
    $tasks = getTasks(10);
    $chances = $_SESSION["is_auth"] ? getChances($_SESSION["email"]) : "0 : 0";

    $isAuth = $_SESSION["is_auth"]; // Откройте common.inc.php

    $smarty->assign(password, $_COOKIE["password"]);
    $smarty->assign("users", $users);
    $smarty->assign("tasks", $tasks);
    $smarty->assign("chances", $chances);
    $smarty->assign("isAuth", $isAuth);
    $smarty->display("index.tpl");