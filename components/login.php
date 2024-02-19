<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script 
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous">
    </script>
    <script src="js/queryAPI.js"></script>

    <style>   

        html {
            background-color: #BA90C6;
        }

        body {

            font-family: Arial, Helvetica, sans-serif;
            background-color: #FDF4F5;
            padding: 20px;
            width: fit-content;

            text-align: center;
        }

    </style>
</head>
<body>

    <div class="content">
        
        <h1>Login</h1>
        
        <form action="../actions/login_validate.php" method="post">

            <?php

                if (isset($_GET["error"])){

                    echo "<p style='color: red'>As credenciais estão erradas</p>";
                }

            ?>

            <label for="">Nome: </label>
            <input name="username" type="text" />

            <br><br>

            <label for="">Palavra passe: </label>
            <input name="password" type="password" />

            <br><br>
            <input type="submit" value="Entrar">
        </form>
    

    </div>
    
</body>
</html>