<?php
@session_start();

//unset($_SESSION["login"]);
include "data.php";
include "actions/validate_login.php";

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">
    
    <script 
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous">
    </script>
    <script src="js/queryAPI.js"></script>
    <script src="js/page_actions.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> <!-- Import the Font Awesome library -->
    <link rel="stylesheet" href="css/styles.css">

    <?php

        if (isset($_GET["close"])){
            echo "<script>window.close();</script>";
        }

    ?>
</head>
<body>

    <?php
        include "components/navbar.php";
    ?>

    <div class="content">

        <?php
            if (isset($_GET["error"])){
                echo "<p style='color: red'>Não foi possível apagar esta colecção, esta é a única que existe</p>";
            }
        ?>
    
        <h1>Biblioteca Digital de <?php echo $_SESSION["login"]; ?></h1> 

        <div>

        <div class="flex two-800">
            <div><span>
                <?php include "components/category_creator.php" ?>
            </span></div>
            <div class="full half-500 third-800"><span>
                <?php include "components/searchbar.php" ?>
            </span></div>  
            
            <br>
            
            <div><span>
                <?php include "components/recents.php" ?>
            </span></div>

        </div>
    </div>
    
</body>
</html>