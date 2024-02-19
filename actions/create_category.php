<?php
    @session_start();

    include_once("../data.php");
    include_once("validate_login.php");;

    $name = $_POST["name"];

    $sql = "INSERT INTO category(name, owner) VALUES('" . $name . "', " . $_SESSION["login-id"] . ")";
    RunQuery($sql);

    header("Location: ..");
    die();
?>