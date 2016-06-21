<?php
    require_once("common.inc.php");
	
    function getTasks($num)
    {
	    return dbQueryGetAssoc("SELECT task_id, text_problem FROM task LIMIT 0, {$num}");
    }
    function getArchiveTask($num)
    {
	    return dbQueryGetAssoc("SELECT archive_task_id, text_problem, response_task FROM  archive_task LIMIT 0, {$num}");
    }