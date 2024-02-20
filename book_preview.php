<?php
@session_start();

include "data.php";
include "actions/validate_login.php";

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pré-visualização de um livro</title>

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
        include "components/navbar.php";
    ?>

    <div class="content">

        <br>

        <?php

            $book = new Book($_POST);
        
            echo "<div class='flex-simple'><div>";
            if(isset($book->image)) echo "<img class='bookcover' src='".$book->image."' /></div><div>";

            echo "<div class='flex-simple'><h1>".$book->name." </h1><span class='bId'>#".$book->id."</span></div>";
            if(isset($book->$subtitle)) echo "<h3>".$book->subtitle."</h3>";
            
            
            echo "<p>Escrito por: <em>";
            echo implode(", ", $book->authors);
            
            echo "</em></p> <p>Data de publicação: <b>".$book->date."</b></p>";
            echo "<p>Numero de páginas: <b>".$book->pages."</b></p>";
            echo "</div></div>";

            echo "<p>Google Books: <a href='".$book->googleBooks."'>".$book->googleBooks."</a></p> <hr>";

            if ($book->categories == NULL) echo "<p>Categorias: Nenhuma categoria disponivel :(</p>";
            else echo "<p>Categorias: <em>".implode(", ", $book->categories)."</em></p>";

            if (isset($book->outline)) echo "<p>".$book->outline."</p>";
            else echo "<p>Nenhum descrição encontrada :(</p>";

            //echo var_dump($_POST);
        ?>

        <!-- Control panel -->
        <?php 
        
            include "components/category_selector.php";

        ?>

    </div>
    
</body>
</html>