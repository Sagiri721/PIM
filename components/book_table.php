<?php
    @session_start();

    $order = "title";
    $orientation = "ASC";
    $collection = "";
    $bought = "";
    $read = "";
    $repeated = "";
    $title = "";
    $lang = "";

    if(isset($_GET["order"]))   $order = $_GET["order"];
    if(isset($_GET["orientation"]))   $orientation = $_GET["orientation"];
    if(isset($_GET["collection"]) && $_GET["collection"] != "") $collection = "AND grouping = " . $_GET["collection"];
    if(isset($_GET["bought"])) $bought = "AND isBought = 1";
    if(isset($_GET["read"]) && $_GET["read"] != "") $read = "AND isRead = " . $_GET["read"];
    if(isset($_GET["repeated"])) $repeated = "AND copies <= 1";
    if(isset($_GET["search"])) $title = "AND (title LIKE '%" . $_GET["search"] . "%' OR authors LIKE '%" . $_GET["search"] . "%')";
    if(isset($_GET["language"]) && $_GET["language"] != ""){
      
        if($_GET["language"] == "other") $_GET["language"] = "";
        $lang = "AND lang = '" . $_GET["language"] . "'";
    }
    
    $query = "SELECT * FROM books WHERE owner = " . strval($_SESSION["login-id"]) . " $collection $bought $read $repeated $title $lang ORDER BY $order $orientation";
    $bookTable = RunQuery($query);

    $results = count($bookTable);
?>

<div class="flex-simple">
    <div class="circle" style="background-color: yellowgreen"></div>
    <p>Leitura terminada</p>

    <div class="circle" style="background-color: yellow"></div>
    <p>Em leitura</p>

    <div class="circle" style="background-color: orange"></div>
    <p>Lido, não adquirido</p>

    <div class="circle" style="background-color: red"></div>
    <p>Comprado</p>
</div>

<br>

<p><?php echo $results ?> Resultados encontrados na sua base de dados pessoal</p>

<table class="no-style">
    <thead>
        <tr>
        <th class="extra">Cópias</th>
        <th class="extra">Capa</th>
        <th>Título</th>
        <th>Autores</th>
        <th class="extra">Páginas</th>
        <th class="extra">Data</th>
        <th class="extra">Géneros</th>
        <th>Lido</th>
        <th>Comprado</th>
        <th class="extra">Colecção</th>
        <th>Acções</th>
        </tr>
    </thead>
    
    <tbody>

        <?php
            
            $collections = RunQuery("SELECT * FROM category WHERE owner = " . strval($_SESSION["login-id"]));
            $colSelect = implode("", array_map(function($collection){
                return "<option value=\"" . $collection["id"] . "\">" . $collection["name"] . "</option>";
            }, $collections));
            
            
            foreach($bookTable as $book){
                $generalId = hexdec( uniqid() );
        ?>


            <tr id="<?php echo $generalId ?>" class="<?php echo getColor($book["isRead"], $book["isBought"]) ?>">
                <td class="center extra flex-around">
                    
                    <?php 
                        echo $book["copies"];

                        if ($book["isBought"]){
                    ?>

                        <i onclick="updateRow(<?php echo $generalId ?>, <?php echo $book["id"]; ?>, 1)" class="fa fa-plus center hoverable" aria-hidden="true"></i>
                        <i onclick="updateRow(<?php echo $generalId ?>, <?php echo $book["id"]; ?>, -1)" class="fa fa-minus center hoverable" aria-hidden="true"></i>

                    <?php
                        }
                    ?>
                </td>
                <td class="extra">
                    <img class="thumbnail" src="<?php echo $book["thumbnail"] ?>>" alt="" srcset="">
                </td>
                <td>
                    <?php echo $book["title"] ?>
                    <?php if($book["lang"] != ""){ ?>
                        <img class="flag" src="https://flagsapi.com/<?php echo strtoupper($book["lang"]) ?>/flat/64.png">
                    <?php } ?>
                </td>
                <td><?php echo implode(", ", explode("</>", $book["authors"])) ?></td>
                <td class="extra"><?php echo $book["pageCount"] ?></td>
                <td class="extra"><?php echo $book["date"] ?></td>
                <td class="extra"><?php echo implode(", ", explode("</>", $book["categories"])) ?></td>
                <td>
                    <select style="background-color: transparent" <?php echo "onchange=\"updateRow(".$generalId.", ".$book["id"].")\""; ?>>
                        <?php 
                            #echo "<label><input onchange=\"updateRow(".$generalId.", ".$book["id"].")\" type=\"checkbox\" " . ($book["isRead"] ? "checked" : "") . "></input><span class=\"checkable\"></span></label>" 
                            $i = 0;
                            foreach($data["status"] as $status){
                                echo "<option " . ($book["isRead"] == $i ? "selected" : "") . " value=\"" . $i . "\">" . $status . "</option>";
                                $i += 1;
                            }
                        ?>
                    </select>
                </td>
                <td><?php echo "<label><input onchange=\"updateRow(".$generalId.", ".$book["id"].")\" type=\"checkbox\" " . ($book["isBought"] ? "checked" : "") . "></input><span class=\"checkable\"></span></label>" ?></td>
                <td class="extra">
                    <?php 
                        $id = hexdec( uniqid() );
                        echo "<select onchange=\"updateRow(".$generalId.", ".$book["id"].")\" class=\"smolselect\" id=\"".$id."\">" . $colSelect . "</select>"; 
                    ?>

                    <script>
                        <?php
                            echo "document.getElementById(\"".$id."\").value = " . $book["grouping"] . ";";
                        ?>
                    </script>
                </td>

                <td class="flex-around center">
                    <i onclick="deleteRow(<?php echo $book["id"]; ?>)" class="fa fa-trash hoverable" aria-hidden="true"></i>
                    <i onclick="BookDetails('<?php echo $book["apiId"]; ?>')" class="fa fa-eye hoverable" aria-hidden="true"></i>
                </td>
            </tr>

        <?php    
            }
        ?>
    </tbody>
</table>