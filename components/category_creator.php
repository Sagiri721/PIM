<div class="flex demo prompt-form">
    <div><span>

        <form action="actions/create_category.php" method="post">
            <h2>Criar nova colecção</h2>
            <label>Nome da colecção: </label>

            <div class="flex">
                <input class="w-100" name="name" type="text">
                <input type="submit" value="Criar">
            </div>
        </form>

    </span></div>

    <div><span>

        <div class="divider-left">
            <h3>As minhas Colecções: </h3>
            <ul class="spaced-list">
                <?php 
                
                    $sql = "SELECT * FROM category WHERE owner = " . $_SESSION["login-id"];
                    $categories = RunQuery($sql);

                    foreach ($categories as $key=>$value) { 

                        $link = "<a style='color: var(--col2)' href='actions/delete_category.php?category=" . $value["name"] . "'><i class='fas fa-trash'></i></a>";
                        $amount = RunQuery("SELECT COUNT(*) FROM books WHERE grouping='".$value["id"]."'")[0]["COUNT(*)"];

                        if($value["protected"]) $link = "";
                        echo "<li>" . $value["name"] . " ($amount) &emsp; $link </li>";
                    }
                ?>
            </ul>
        </div>
        
    </span></div>
  </div>
