<?php
    require_once("common.inc.php");

    $g_monthes = array(
        1 => 'января',
        2 => 'февраля',
        3 => 'марта',
        4 => 'апреля',
        5 => 'мая',
        6 => 'июня',
        7 => 'июля',
        8 => 'августа',
        9 => 'сентября',
        10 => 'октября',
        11 => 'ноября',
        12 => 'декабря'
    );

    function convertDateRu($date)
    {
        global $g_monthes;
        $date = strtotime($date);

        $month = $g_monthes[date('n', $date)];
        $day   = date('j', $date);
        $year  = date('Y', $date);
        $unixTime = date($date);

        return array (
            "year" => $year,
            "month" => $month,
            "day" => $day,
            "unixTime" => $unixTime
        );
    }

    function doesGame()
    {
        $nextGameTime = convertDateRu(NEXT_GAME_DATE);
        $nextGameTime = intval($nextGameTime["unixTime"]);
        $gameOverTime = convertDateRu(GAME_OVER_DATE);
        $gameOverTime = intval($gameOverTime["unixTime"]);
        return time() > $nextGameTime && time() < $gameOverTime;
    }
