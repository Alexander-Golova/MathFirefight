<?php
    require_once("/include/common.inc.php");

    if (isAuth($_SESSION["email"]) && isset($_POST["targetTask"]) && isset($_POST["targetPlayer"]) && isset($_POST["answer"]))
    {
        if (!empty($_POST["targetTask"]) && !empty($_POST["targetPlayer"]) && (strlen($_POST["answer"]) > 0))
        {
            $playerId = getPlayerIdByUserEmail($_SESSION["email"]);

            $targetTask = intval(substr($_POST["targetTask"], strlen("task"), strlen($_POST["targetTask"])));
            $targetPlayer = intval(substr($_POST["targetPlayer"], strlen("user"), strlen($_POST["targetPlayer"])));

            $answer = trim($_POST["answer"]);

            if (checkTaskStatus($targetTask, $playerId) && checkAnswer($targetTask, $answer))
            {
                if (tryShoot($playerId, $targetPlayer))
                {
                    $hit = calcHit(getPlayerHP($playerId));
                    dbQuery("UPDATE current_game SET lives = lives - {$hit} WHERE player_id = {$targetPlayer}");
                }
                dbQuery("UPDATE current_game SET chance_hit = chance_hit + 1 WHERE player_id = {$playerId}");
                dbQuery("UPDATE current_game SET target = target + 1 WHERE player_id = {$targetPlayer}");
            }
            else
            {
                dbQuery("UPDATE current_game SET chance_miss =  chance_miss + 1 WHERE player_id = {$playerId}");
            }
            changeTaskStatus($targetTask, $playerId);

            $response = array(
                "chances" => getChances(getPlayerIdByUserEmail($_SESSION["email"]))
            );
            echo(json_encode($response));
        }
    }
