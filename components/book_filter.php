<form id="filterform" action="library.php" method="GET">

    <h3>Filtros</h3>

    <div class="filters">

        <label>Ordenar por</label>
        <select name="order" onchange="this.form.submit()">
            <option <?php if($_GET["order"] == "title") echo "selected" ?> value="title">Título</option>
            <option <?php if($_GET["order"] == "authors") echo "selected" ?> value="authors">Autores</option>
            <option <?php if($_GET["order"] == "pageCount") echo "selected" ?> value="pageCount">Páginas</option>
            <option <?php if($_GET["order"] == "date") echo "selected" ?> value="date">Ano de lançamento</option>
            <option <?php if($_GET["order"] == "isRead") echo "selected" ?> value="isRead">Lido</option>
            <option <?php if($_GET["order"] == "isBought") echo "selected" ?> value="isBought">Comprado</option>
        </select>
        
        <select name="orientation" onchange="this.form.submit()" >
            <option <?php if($_GET["orientation"] == "ASC") echo "selected" ?> value="ASC">Ascendente</option>
            <option <?php if($_GET["orientation"] == "DESC") echo "selected" ?> value="DESC">Descendente</option>
        </select>
        
        <br>

        <label>Na colecção</label>
            <select name="collection" onchange="this.form.submit()">
                <option value="">Qualquer colecção</option>
                <?php
                    $collections = RunQuery("SELECT * FROM category WHERE owner = " . strval($_SESSION["login-id"]));
                    $colSelect = implode("", array_map(function($collection){
                        return "<option " . ($_GET["collection"] == $collection["id"] ? "selected" : "") . " value=\"" . $collection["id"] . "\">" . $collection["name"] . "</option>";
                    }, $collections));

                    echo $colSelect;
                ?>
            </select>

        <div><span>
            <label><input name="search" id="search" type="text" placeholder="Título ou autor" value="<?php if(isset($_GET["search"])) echo $_GET["search"] ?>"></label>
        </span></div>

        <div><span>

            <br>
            
            <label>
                <input name="bought" type="checkbox" onchange="this.form.submit()" <?php if($_GET["bought"] == "on") echo "checked" ?>>
                <span class="checkable">Apenas comprados</span>
            </label>

            <label>
                <input name="read" type="checkbox" onchange="this.form.submit()" <?php if($_GET["read"] == "on") echo "checked" ?>>
                <span class="checkable">Apenas lidos</span>
            </label>
            <br>
            <label>
                <input name="repeated" type="checkbox" onchange="this.form.submit()" <?php if($_GET["repeated"] == "on") echo "checked" ?>>
                <span class="checkable">Esconder repetidos</span>
            </label>

        </span></div>

    </div>
    
    <a href="library.php">Limpar filtros</a>
    <br><br>

</form>