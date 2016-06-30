<?php
    require_once("common.inc.php");
	
    function getTasks($email)
    {
        $playerId = getPlayerIdByUserEmail($email);
        $tasks = array();
        if ($playerId)
        {
            $mask = dbQueryGetAssoc("SELECT label_task FROM current_game WHERE player_id = {$playerId}");
            $tasks = getTasksByMask($mask[0]["label_task"]);
        }

        return $tasks;
    }

    function getTasksByMask($mask)
    {
        $data = array();;
        for ($i = 0; $i < strlen($mask); ++$i)
        {
            if ($mask[$i] == TASK_OPEN)
            {
                array_push($data, $i + 1);
            }
        }

        $selector = generSelector($data);
        return dbQueryGetAssoc("SELECT task_id, text_problem FROM task WHERE {$selector}");
    }

    function generSelector($tasksId)
    {
        $selector = "task_id = 0";
        foreach ($tasksId as $taskId)
        {
            $selector .= " OR task_id = {$taskId}";
        }
        return $selector;
    }

    function getArchiveTask()
    {
	    return dbQueryGetAssoc("SELECT archive_task_id, text_problem, response_task FROM  archive_task");
    }

    function checkAnswer($taskId, $playerAnswer)
    {
        $correctAnswer = dbQueryGetAssoc("SELECT response_task FROM task WHERE task_id = {$taskId}");
        return $playerAnswer == $correctAnswer[0]["response_task"];
    }

    function changeTaskStatus($taskId, $playerId)
    {
        $labelTask = dbQueryGetAssoc("SELECT label_task FROM current_game WHERE player_id = {$playerId}");
        $labelTask = $labelTask[0]["label_task"];
        $labelTask[$taskId - 1] = TASK_CLOSED;
        dbQuery("UPDATE current_game SET label_task = '{$labelTask}' WHERE player_id = {$playerId}");
    }

    function checkTaskStatus($taskId, $playerId)
    {
        $labelTask = dbQueryGetAssoc("SELECT label_task FROM current_game WHERE player_id = {$playerId}");
        $labelTask = $labelTask[0]["label_task"];
        return $labelTask[$taskId - 1] == TASK_OPEN;
    }

    function addTasks($round, $numberTasks)
    {
         $firstRoundTask = $numberTasks * ($round - 1);
         $latestRoundTask = $round * $numberTasks;
         $players = getAllPlayersId();

         foreach ($players as $player)
         {
             $id = intval($player["player_id"]);
             $labelTask = dbQueryGetAssoc("SELECT label_task FROM current_game WHERE player_id = {$id}");
             $labelTask = $labelTask[0]["label_task"];
             for ($i = $firstRoundTask; $i < $latestRoundTask; ++$i)
             {
                $labelTask[$i] = TASK_OPEN;
             }
             dbQuery("UPDATE current_game SET label_task = '{$labelTask}' WHERE player_id = {$id}");
         }
    }

    function closeAllTasks()
    {
        $players = getAllPlayersId();
        foreach ($players as $player)
        {
            $id = intval($player["player_id"]);
            $labelTask = ALL_TASKS_ARE_CLOSED;
            dbQuery("UPDATE current_game SET label_task = '{$labelTask}' WHERE player_id = {$id}");
        }
    }
