<?php
    require_once("include/common.inc.php");

    $tasks = getTasks($_SESSION["email"]);
    $response = array (
        "tasks" => $tasks
    );
    echo(json_encode($response));