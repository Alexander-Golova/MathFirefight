<?php
    require_once("include/common.inc.php");

    $players = getPlayers();
    $response = array (
        "players" => $players
    );
    echo(json_encode($response));