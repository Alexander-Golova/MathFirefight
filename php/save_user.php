<?php                                  
    require_once('include/common.inc.php');
	
	$firstName = trim(dbQuote(getFromPost("firstName")));
	$lastName = trim(dbQuote(getFromPost("lastName")));
	$email = trim(dbQuote(getFromPost("email")));
	$password = md5(dbQuote(getFromPost("password")));
	
	if (isset($firstName) && isset($lastName) && isset($email) && isset($password))
	{
	    if (!isUserinDB($email))
	    {
            dbQuery("INSERT INTO user
                    (first_name, last_name, email, registration_date, password)
                VALUES
                    ('{$firstName}', '{$lastName}', '{$email}', NOW(), '{$password}')");

            $lastInsertID = dbGetLastInsertId();
            dbQuery("INSERT INTO user_game
                    (user_id)
                VALUES
                    ('{$lastInsertID}')");
	    }
	}

	header("Location: ../index.php");