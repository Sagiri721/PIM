<?php
    @session_start();
    $bookTable = RunQuery("SELECT * FROM books");
?>

<div class="flex-simple">
    <div class="circle" style="background-color: yellowgreen"></div>
    <p>Lido</p>

    <div class="circle" style="background-color: yellow"></div>
    <p>Comprado</p>

    <div class="circle" style="background-color: orange"></div>
    <p>Lido mas não adquirido</p>
</div>

<br>

<table class="no-style">
    <thead>
        <tr>
        <th class="extra">ID</th>
        <th>Título</th>
        <th>Autores</th>
        <th>Páginas</th>
        <th class="extra">Data</th>
        <th class="extra">Géneros</th>
        <th>Lido</th>
        <th>Comprado</th>
        <th class="extra">Colecção</th>
        </tr>
    </thead>
    
    <tbody>

        <?php
            
            $collections = RunQuery("SELECT * FROM category WHERE owner = " . strval($_SESSION["login-id"]));
            $colSelect = implode("", array_map(function($collection){
                return "<option value=\"" . $collection["id"] . "\">" . $collection["name"] . "</option>";
            }, $collections));

            foreach($bookTable as $book){
        ?>

            <tr class="<?php echo (($book["isRead"] && !$book["isBought"]) ? "bnr" : (($book["isRead"]) ? "read" : ($book["isBought"] ? "bought" : ""))) ?>">
                <td class="extra"><?php echo $book["id"] ?></td>
                <td><?php echo $book["title"] ?></td>
                <td><?php echo implode(", ", explode("</>", $book["authors"])) ?></td>
                <td><?php echo $book["pageCount"] ?></td>
                <td class="extra"><?php echo $book["date"] ?></td>
                <td class="extra"><?php echo implode(", ", explode("</>", $book["categories"])) ?></td>
                <td><?php echo "<label><input type=\"checkbox\" " . ($book["isRead"] ? "checked" : "") . "></input><span class=\"checkable\"></span></label>" ?></td>
                <td><?php echo "<label><input type=\"checkbox\" " . ($book["isBought"] ? "checked" : "") . "></input><span class=\"checkable\"></span></label>" ?></td>
                <td class="extra">
                    <?php 
                        $id = hexdec( uniqid() );
                        echo "<select class=\"smolselect\" id=\"".$id."\">" . $colSelect . "</select>"; 
                    ?>

                    <script>
                        <?php
                            echo "document.getElementById(\"".$id."\").value = " . $book["grouping"] . ";";
                        ?>
                    </script>
                </td>
            </tr>

        <?php    
            }
        ?>
    </tbody>
</table>