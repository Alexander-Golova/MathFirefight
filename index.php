<?php
    require_once("php/include/common.inc.php");
    require_once("libs/Smarty.class.php");

    if ($_SESSION["is_auth"])
    {
        if (isUserInGame(getUserIdByUserEmail($_SESSION["email"])))
        {
            header("Location: game.php");
        }
    }

    $smarty = new Smarty();

    $players = getPlayers();

    $isAuth = $_SESSION["is_auth"]; // Открыть common.inc.php
    $startDateGame = convertDateRu(NEXT_GAME_DATE);
    $startTimeGame = date('H:i', strtotime(NEXT_GAME_DATE));

    $smarty->assign(password, $_COOKIE["password"]);
    $smarty->assign("players", $players);
    $smarty->assign("isAuth", $isAuth);

    $smarty->assign("startDateGame", $startDateGame);
    $smarty->assign("startTimeGame", $startTimeGame);
    $smarty->assign("doesGameStart", doesGame());

    $smarty->display("index.tpl");
