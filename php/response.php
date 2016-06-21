<?php
    require_once("/include/common.inc.php");

    $targetTask = $_COOKIE["targetTask"];
    $targetPlayer = intval(substr($_COOKIE["targetPlayer"], strlen(user), strlen($_COOKIE["targetPlayer"])));
    $answer = $_POST["answer"];

    dbQuery("UPDATE user_game SET lives = lives - hit WHERE user_game_id={$targetPlayer}");

    header("Location: ../index.php");