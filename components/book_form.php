<form class="book-form" action="../actions/store_book.php?collection=<?php echo $_GET["collection"] ?>" method="post">

    <input type="text" style="display: none;" id="apiID" name="apiID" />

    <div class="flex demo">
        <div><span>

            <label> Título: </label>
            <input type="text" name="name" id="name" required>
            <span class="required"></span>
            <br>

            <div class="detail" id="auth">
                
                <label> Autores: </label>
                <div id="authors" name="authors">
            
                </div>
                <button onclick="addItem(0)" type="button">Adicionar autor</button>

            </div>
        
            <br>
            <br>
        
            <label> Número de páginas: </label>
            <input type="number" name="pages" id="pages">
            <br>
            <label> Data de publicação: </label>
            <input type="date" name="date" id="date">
        
            <br>
        
            <div class="detail" id="genre">

                <label> Géneros: </label>
                <div id="categories" name="genres">
            
                </div>
                <button onclick="addItem(1)" type="button">Adicionar género</button>

            </div>
        
            <br>

        </span></div>
        <div><span>

            <label> Descrição: </label>
            <br>
            <textarea name="outline" id="outline" ></textarea>
        
            <br>
        
            <label> Capa: </label>
            <input type="text" name="image" id="image" placeholder="URL da imagem">
        
            <br>
        
            <label>
                <input name="isRead" id="isRead" name="read" type="checkbox">
                <span class="checkable">Já o li</span>
            </label>
        
            <br>
        
            <label>
                <input name="isBought" id="isBought" name="bought" type="checkbox">
                <span class="checkable">Já o comprei</span>
              </label>
            <br>

            <br>
            <label for="">Linguagem: </label>
            <select name="language" id="language">
                <?php
                
                    foreach($data["languages"] as $key=>$value) {
                
                        echo "<option value=" . $key . ">". $value . "</option>";
                    }
                
                ?>
            </select>

        </span></div>
    </div>

    <hr>

    <?php 
    
        if(isset($_GET["collection"])){

            echo "<button class=\"error\" onclick=\"window.close()\">Cancelar</button>";
            echo "<input class=\"success\" type=\"submit\" value=\"Confirmar adição\">";
        }else {

            ?>
            <input type="submit" value="Adicionar á biblioteca pessoal de"></input>
        
            <select id="group" name="group">
        
            <?php
        
                $sql = "SELECT id, name FROM category WHERE owner = " . $_SESSION["login-id"];
                $result = RunQuery($sql);
        
                foreach($result as $key=>$value) {
        
                    echo "<option value=" . $value["id"] . ">". $value["name"] . "</option>";
                }
        
            ?>
        
            </select>

            <?php
        }
    
    ?>

<input type="text" style="display:none" name="genres" id="hG"></input>
<input type="text" style="display:none" name="authors" id="hA"></input>
<input type="text" style="display:none" name="api" id="api"></input>
</form>