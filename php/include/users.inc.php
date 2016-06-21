<?php
    require_once("common.inc.php");
	
    function getUsers()
    {
	    return dbQueryGetAssoc("SELECT user_game.user_game_id, user_game.lives, user.first_name, user.last_name
	                            FROM user_game, user
	                            WHERE user.user_id = user_game.user_id
	                            ORDER BY user_game.lives DESC");
    }

    function getBestUsers($num)
    {
	    return dbQueryGetAssoc("SELECT best_games.lives, user.first_name, user.last_name
	                            FROM best_games, user
	                            WHERE user.user_id = best_games.user_id
	                            ORDER BY best_games.lives DESC
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

    function isUserInDB($email)
    {
        global $g_dbLink;
        $query = "SELECT email FROM user WHERE email = '" . $email . "'";

        $result = mysqli_query($g_dbLink, $query);
        if(($row = mysqli_fetch_array($result)))
        {
            return $row;
        }
    }

    function checkPass($email, $password)
    {
        global $g_dbLink;

        $email = dbQuote($email);
        $password = dbQuote($password);
        $password = md5($password);

        $query = "SELECT email, password FROM user WHERE email = '{$email}' AND password = '{$password}'";
        $result = mysqli_query($g_dbLink, $query);

        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_array($result);
            return $row;
        }
        return false;
    }

    function getUserID($email, $password)
    {
        global $g_dbLink;

        $password = md5($password);

        $query = "SELECT user_id FROM user WHERE email = '{$email}' AND password = '{$password}'";
        $result = dbQueryGetAssoc($query);
        $userID = $result[0]["user_id"];
        $userID = intval($userID);
        return($userID);
    }

    function getUserEmailByFileUserID($userID)
    {
        global $g_dbLink;

        $query = "SELECT user.email FROM user, file WHERE file.user_id = {$userID} AND file.user_id = user.user_id";
        $result = mysqli_query($g_dbLink, $query);
        $temp = mysqli_fetch_assoc($result);
        return($temp["email"]);
    }

    function getUserIDByUserEmail($email)
    {
        $email = dbQuote($email);
        $query = "SELECT user_id FROM user WHERE email = '{$email}'";

        $result = dbQueryGetAssoc($query);
        if ($result)
        {
            $userID = $result[0]["user_id"];
            $userID = intval($userID);
            return $userID;
        }
        return 0;
    }

    function getChances($email)
    {
        $userID = getUserIDByUserEmail($email);

        $hitChance = dbQueryGetAssoc("SELECT chance_hit FROM user_game WHERE user_id = {$userID}");
        $missChance = dbQueryGetAssoc("SELECT chance_miss FROM user_game WHERE user_id = {$userID}");

        return $hitChance[0]["chance_hit"] . " : " . $missChance[0]["chance_miss"];
    }