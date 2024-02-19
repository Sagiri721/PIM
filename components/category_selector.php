<form action="#">

    <button type="button" onclick="LoadBookFromId()">Adicionar á biblioteca pessoal de</button>
    <input type="text" style="display:none" id="bookId" value="<?php echo $book->id ?>" />

    <select id="category">

    <?php

        $sql = "SELECT id, name FROM category WHERE owner = " . $_SESSION["login-id"];
        $result = RunQuery($sql);

        foreach($result as $key=>$value) {

            echo "<option value=" . $value["id"] . ">". $value["name"] . "</option>";
        }

    ?>

    </select>
</form>