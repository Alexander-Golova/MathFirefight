<?php
    require_once("php/include/common.inc.php");
    require_once("libs/Smarty.class.php");

    if (!$_SESSION["is_auth"] || !isUserInGame(getUserIdByUserEmail($_SESSION["email"])))
    {
        header("Location: index.php");
    }

    $smarty = new Smarty();

    $players = getPlayers();
    $tasks = getTasks($_SESSION["email"]);
    $chances = getChances(getPlayerIdByUserEmail($_SESSION["email"]));
    $chances = $chances["hitChance"] . " : " . $chances["missChance"];

    $isAuth = $_SESSION["is_auth"]; // Откройте common.inc.php

    $smarty->assign(password, $_COOKIE["password"]);
    $smarty->assign("players", $players);
    $smarty->assign("tasks", $tasks);
    $smarty->assign("chances", $chances);
    $smarty->assign("isAuth", $isAuth);
    $smarty->display("game.tpl");