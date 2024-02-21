<?php
    @session_start();

    include_once("../data.php");
    include_once("validate_login.php");

    if ($_GET["collection"] == "" || !isset($_GET["collection"])) $_GET["collection"] = $_POST["group"];

    $sql = "INSERT INTO `books` (`title`, `authors`, `pageCount`, `date`, `categories`, `description`, `thumbnail`, `isRead`, `isBought`, `grouping`, `owner`, `apiId`) VALUES (\"".$_POST["name"]."\", \"".$_POST["authors"]."\", \"".$_POST["pages"]."\", \"".$_POST["date"]."\", \"".$_POST["genres"]."\", \"".$_POST["outline"]."\", \"".$_POST["image"]."\", \"".($_POST["isRead"]=="on")."\", \"".($_POST["isBought"]=="on")."\", \"".$_GET["collection"]."\", \"".$_SESSION["login-id"]."\", \"".$_POST["api"]."\") ";
    echo $sql;
    
    RunQuery($sql);

    header("Location: ..?close=1");
?>