<?php
    require_once("php/include/common.inc.php");
    require_once("libs/Smarty.class.php");
    $smarty = new Smarty();

    $best_users = getBestUsers(10);
    $popular_targets = getPopularTarget(10);
    $isAuth = $_SESSION["is_auth"]; // Откройте common.inc.php

    $smarty->assign("best_users", $best_users);
    $smarty->assign("popular_targets", $popular_targets);
    $smarty->assign("isAuth", $isAuth);
    $smarty->display("best_games.tpl");