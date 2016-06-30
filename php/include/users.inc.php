<?php
    require_once("common.inc.php");
	
    function checkPass($email, $password)
    {
        $email = dbQuote($email);
        $password = dbQuote($password);
        $password = md5($password);

        return dbQueryGetAssoc("SELECT email, password
                         FROM user
                         WHERE email = '{$email}'
                         AND password = '{$password}'");
    }

    function getUserIdByUserEmail($email)
    {
        $email = dbQuote($email);
        $query = "SELECT user_id FROM user WHERE email = '{$email}'";

        $result = dbQueryGetAssoc($query);
        if (!empty($result))
        {
            return intval($result[0]["user_id"]);
        }
        return 0;
    }

    function isUserInGame($id)
    {
        $result = dbQueryGetAssoc("SELECT user_id FROM current_game WHERE user_id = {dbQuote($id)}");
        return !empty($result);
    }

    function isUserInDB($email)
    {
        $result = dbQueryGetAssoc("SELECT email FROM user WHERE email = '{dbQuote($email)}'");
        return !empty($result);
    }