<?php
    @session_start();

    include_once("../data.php");
    include_once("validate_login.php");

    // Update lmao
    $sql = "UPDATE books SET isRead = " . $_GET["isRead"] . ", isBought = " . $_GET["isBought"] . ", grouping = " . $_GET["collection"] . " WHERE id = " . $_GET["id"];
    RunQuery($sql);

    echo 0;
?>