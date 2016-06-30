<?php
    require_once("common.inc.php");

    function getPlayerIdByUserEmail($email)
    {
        $email = dbQuote($email);
        $user_id = intval(getUserIdByUserEmail($email));
        $query = "SELECT player_id FROM current_game WHERE user_id = {$user_id}";

        $result = dbQueryGetAssoc($query);
        if (!empty($result))
        {
            return intval($result[0]["player_id"]);
        }
        return 0;
    }

    function getPlayers()
    {
        return dbQueryGetAssoc("SELECT current_game.player_id, current_game.lives, user.first_name, user.last_name
                                FROM current_game, user
                                WHERE user.user_id = current_game.user_id
                                ORDER BY current_game.lives DESC");
    }

    function getAllPlayersId()
    {
        return dbQueryGetAssoc("SELECT player_id FROM current_game");
    }

    function updateBestPlayers()
    {
        $bestPlayer = dbQueryGetAssoc("SELECT user_id, lives FROM current_game ORDER BY lives DESC LIMIT 0, 1");
        $id = intval($bestPlayer[0]["user_id"]);
        $lives = intval($bestPlayer[0]["lives"]);

        dbQuery("INSERT INTO best_player (user_id, lives) VALUES ('{$id}', '{$lives}')");
    }

    function updatePopularTarget()
    {
        $popularTarget = dbQueryGetAssoc("SELECT user_id, target FROM current_game ORDER BY target DESC LIMIT 0, 1");
        $id = intval($popularTarget[0]["user_id"]);
        $target = intval($popularTarget[0]["target"]);

        dbQuery("INSERT INTO popular_target (user_id, target) VALUES ('{$id}', '{$target}')");
    }

    function removeInactivePlayers()
    {
        $chance_hit = intval(INITIAL_HIT_CHANCE);
        $chance_miss = intval(INITIAL_MISS_CHANCE);
        $inactivePlayers = dbQueryGetAssoc("SELECT player_id FROM current_game
                                            WHERE
                                                chance_hit = {$chance_hit}
                                                AND chance_miss = {$chance_miss}");
        foreach ($inactivePlayers as $player)
        {
            $id = intval($player["player_id"]);
            dbQuery("DELETE FROM current_game WHERE player_id = {$id}");
        }
    }

    function getBestPlayer($num)
    {
        return dbQueryGetAssoc("SELECT best_player.lives, user.first_name, user.last_name
                                FROM best_player, user
                                WHERE user.user_id = best_player.user_id
                                ORDER BY best_player.lives DESC
                                LIMIT 0, {$num}");
    }

    function getPopularTarget($num)
    {
        return dbQueryGetAssoc("SELECT popular_target.target, user.first_name, user.last_name
                                FROM popular_target, user
                                WHERE user.user_id = popular_target.user_id
                                ORDER BY popular_target.target DESC
                                LIMIT 0, {$num}");
    }