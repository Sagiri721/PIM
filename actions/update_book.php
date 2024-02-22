<?php
    @session_start();

    include_once("../data.php");
    include_once("validate_login.php");

    // Updating the book
    $incr = "copies = copies + (". $_GET["amount"] .")";

    // Get bought state
    $row = RunQuery("SELECT isBought, copies FROM books WHERE id = " . $_GET["id"])[0];
    $state = $row["isBought"];
    $copies = $row["copies"];

    if($state == 0 && $_GET["isBought"] == "true"){
        $incr = "copies = 1";
    }else if($_GET["isBought"] == "false"){
        $incr = "copies = 0";
    }

    if ((intval($copies) + intval($_GET["amount"]) <= 0) && $_GET["isBought"] == "true"){
        $incr = "copies = 1";
    }

    $sql = "UPDATE books SET $incr, isRead = " . $_GET["isRead"] . ", isBought = " . $_GET["isBought"] . ", grouping = " . $_GET["collection"] . " WHERE id = " . $_GET["id"];
    RunQuery($sql);

    echo $sql;
?>