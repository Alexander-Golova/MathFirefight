<?php
    require_once("php/include/common.inc.php");
    require_once("libs/Smarty.class.php");
    $smarty = new Smarty();

    $archive_tasks = getArchiveTask();
    $isAuth = $_SESSION["is_auth"]; // Откройте common.inc.php

    $smarty->assign("archive_tasks", $archive_tasks);
    $smarty->assign("isAuth", $isAuth);
    $smarty->display("archive.tpl");