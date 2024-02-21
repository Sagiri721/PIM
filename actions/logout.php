<?php

    @session_start();

    include_once("../data.php");
    include_once("validate_login.php");

    unset($_SESSION["login"]);
    unset($_SESSION["login-id"]);
    unset($_SESSION["login-name"]);

    @session_destroy();

    header("Location: /" . $arrConfig["webName"] . "/index.php");

?>