<?php
    @session_start();
    include_once "../data.php";

    if (!isset($_SESSION["login"]) || !isset($_SESSION["login-id"])) {

        header("Location: /".$arrConfig["webName"]."/components/login.php");
    }
?>