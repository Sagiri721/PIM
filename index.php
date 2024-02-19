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

</head>
<body>

    <?php
        include "components/navbar.htm";
    ?>

    <div class="content">

        <?php
            if (isset($_GET["error"])){
                echo "<p style='color: red'>Não foi possível apagar esta colecção, esta é a única que existe</p>";
            }

        ?>
    
        <h1>Organizador de livros</h1> 

        <div>

            <?php include "components/category_creator.php" ?>
            <br>
            <?php include "components/searchbar.php" ?>

        </div>
    </div>
    
</body>
</html>