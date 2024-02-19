<?php
    session_start();

    include_once("../data.php");
    include_once("validate_login.php");;

    $categoryList = RunQuery("SELECT * FROM category WHERE owner = " . $_SESSION["login-id"]);    

    if(count($categoryList) <= 1) {

        header("Location: ../index.php?error=1");
        die();
    }

    $id = RunQuery("SELECT id FROM category WHERE name = '".$_GET["category"]."'")[0]["id"];
    $delete = "UPDATE books SET grouping = '1' WHERE grouping = '".$id."'";
    RunQuery($delete);

    $sql = "DELETE FROM category WHERE name = '" . $_GET["category"] . "' AND owner = " . $_SESSION["login-id"];
    RunQuery($sql);

    header("Location: ..");
    die();
?>

