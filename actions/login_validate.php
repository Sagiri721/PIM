<?php
    session_start();

    include_once("../data.php");

    $username = $_POST["username"];
    $password = $_POST["password"];

    if(AreCredentialRight($username, $password, $arrConfig)){

        $user_id = RunQuery("SELECT id FROM people WHERE name = '" . $username . "'");
        $_SESSION['login'] = $username;
        $_SESSION['login-id'] = $user_id[0]["id"];
        header("Location: ..");
        
    }else {

        header("Location: ../components/login.php?error=1");
        die;
    }
?>
