<?php
    @session_start();

    include_once("../data.php");
    include_once("validate_login.php");

    $sql = "DELETE FROM books WHERE id = " . $_GET["id"];
    RunQuery($sql);

    echo 0;
?>