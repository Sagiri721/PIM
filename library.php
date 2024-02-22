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

    <link rel="stylesheet" href="css/picnic2.css">
    
    <script 
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous">
    </script>

    <script src="js/queryAPI.js"></script>
    <script src="js/page_actions.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> <!-- Import the Font Awesome library -->
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>

    <?php
        include "components/navbar.php";
    ?>

    <div class="content">
    
        <h1>Biblioteca pessoal</h1> 

        <div class="zoom">
            <?php
                include "components/book_filter.php";
                include "components/book_table.php";
            ?>
        </div>

    </div>
    
</body>
</html>