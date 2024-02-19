<?php         
    $sql = "SELECT COUNT(*) FROM books;";
    $res = RunQuery($sql);
    echo $res[0]["COUNT(*)"];
?>