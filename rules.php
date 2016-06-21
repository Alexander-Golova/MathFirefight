<?php
    require_once("php/include/common.inc.php");
    require_once("libs/Smarty.class.php");
    $smarty = new Smarty();

    $isAuth = $_SESSION["is_auth"]; // Откройте common.inc.php

    $smarty->assign("isAuth", $isAuth);
    $smarty->display("rules.tpl");