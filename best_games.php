<?php
    require_once("php/include/common.inc.php");
    require_once("libs/Smarty.class.php");
    $smarty = new Smarty();

    $best_players = getBestPlayer(intval(NUMBER_OF_RECORDS));
    $popular_targets = getPopularTarget(intval(NUMBER_OF_RECORDS));
    $isAuth = $_SESSION["is_auth"]; // Откройте common.inc.php

    $smarty->assign("best_players", $best_players);
    $smarty->assign("popular_targets", $popular_targets);
    $smarty->assign("isAuth", $isAuth);
    $smarty->display("best_games.tpl");