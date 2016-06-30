<?php                                  
    require_once('include/common.inc.php');
	
	$firstName = trim(dbQuote(getFromPost("firstName")));
	$lastName = trim(dbQuote(getFromPost("lastName")));
	$email = trim(dbQuote(getFromPost("email")));
	$password = md5(dbQuote(getFromPost("password")));
	$password2 = md5(dbQuote(getFromPost("password2")));
	
	if (isset($firstName) && isset($lastName) && isset($email) && isset($password) && isset($password2))
	{
	    if (!isUserinDB($email) && ($password == $password2))
	    {
            dbQuery("INSERT INTO user
                    (first_name, last_name, email, registration_date, password)
                VALUES
                    ('{$firstName}', '{$lastName}', '{$email}', NOW(), '{$password}')");

            auth($email, dbQuote(getFromPost("password")));
	    }
	}
	header("Location: ../index.php");
