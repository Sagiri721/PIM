<?php
    @session_start();

    include_once("../data.php");
    include_once("validate_login.php");
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adição de informação</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">

    <script 
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous">
    </script>
    <script src="../js/queryAPI.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> <!-- Import the Font Awesome library -->
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>

    <?php
        include "../components/navbar.php";
    ?>

    <div class="content">

        <h1>Adicionar livros</h1>
        <?php

            include "../components/book_form.php";
            
            $bookObj = new Book($_POST);
            $text = "document.getElementById(\"api\").value = \"".$bookObj->googleBooks."\";\n";
            
            foreach ($bookObj as $key=>$value) {

                $value = str_replace("'", "", $value);
                $value = str_replace("\"", "", $value);
                
                if($key == "categories" || $key == "authors"){
                    
                    $inside = "<ol>";
                    foreach($value as $key2=>$value2){

                        $id = hexdec( uniqid() );
                        $inside = $inside . "<li id=\"$id\">".$value2."&emsp;<button type=\"button\" onclick=\"removeItem($id)\">Remover da lista</button></li>";
                    }
                    $inside = $inside . "</ol>";
                    
                    $text = $text . ("try{ document.getElementById(\"".$key."\").innerHTML = '".$inside."';}catch(err){console.error(err);}\n");
                    
                }else{
                    
                    $text = $text . "try{document.getElementById(\"" . $key . "\").value = '" . $value . "';}catch(err){console.error(err);}\n";
                }
                
            }
            echo "<script type='text/javascript'>$text</script>";
        ?>

    </div>
    
    <script src="../js/book_form.js"></script>

</body>
</html>