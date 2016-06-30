<?php
    require_once("common.inc.php");

    function getChances($playerId)
    {
        $chances = dbQueryGetAssoc("SELECT chance_hit, chance_miss FROM current_game WHERE player_id = {$playerId}");
        $hitChance = intval($chances[0]["chance_hit"]);
        $missChance = intval($chances[0]["chance_miss"]);

        return array (
            "hitChance" => $hitChance,
            "missChance" => $missChance
        );
    }

    function getPlayerHP($playerId)
    {
        $playerHP = dbQueryGetAssoc("SELECT lives FROM current_game WHERE player_id = {$playerId}");
        return intval($playerHP[0]["lives"]);
    }

    function tryShoot($playerId, $targetId)
    {
        $chances = getChances($playerId);
        $targetHP = getPlayerHP($targetId);

        $elementChance = rand(0, $chances["hitChance"] + $chances["missChance"]) <= $chances["hitChance"];
        return $elementChance && ($playerId != $targetId) && ($targetHP > 0);
    }

    function calcHit($playerHP)
    {
        // Удар составляет 20% от жизни игрока, если её больше 15 или 3, если меньше.
        // Если жизнь игрока отрицательна (его уже убили), то его удар равен -10, т.е.
        // игрок в этом случае повышает жизнь живым игрокам.
        $hit = 0;

        if ($playerHP >= 15)
        {
            $hit = $playerHP / 5;
        }
        else
        {
            if ($playerHP > 0)
            {
                $hit = 3;
            }
            else
            {
                $hit = -10;
            }
        }
        return $hit;
    }

