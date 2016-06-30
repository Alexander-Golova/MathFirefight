<?php
    require_once('include/common.inc.php');

    if (isAuth($_SESSION["email"]) && !doesGame())
    {
        $userId = getUserIdByUserEmail($_SESSION["email"]);
        if (!isUserInGame($userId))
        {
            dbQuery("INSERT INTO current_game
                                (user_id)
                            VALUES
                                ('{$userId}')");

        }
    }

	header("Location: ../index.php");