<?php
    require_once('config.inc.php');
	
    $fileDir = scandir(INCLUDE_DIR);
	
	if ($fileDir)
    {
		foreach ($fileDir as $fileName)
        {
			if (is_file(INCLUDE_DIR . $fileName) && stristr($fileName, ".inc.php"))
            {
			    require_once($fileName);
            }
        }
    }

	dbInitialConnect();
	session_id("IPS-2015");
	session_start();

	$_SESSION["is_auth"] = isAuth();