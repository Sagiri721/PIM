<h2>Recentemente adicionados</h2>

<?php 

$sql = "SELECT * FROM books WHERE owner = " . $_SESSION["login-id"] . " ORDER BY id DESC LIMIT 5";
$results = RunQuery($sql);

if(count($results) == 0) echo "Nenhum livro adicionado ainda";

foreach ($results as $key=>$value) { 
    echo "<a href='library.php?search=".$value["title"]."'>" . $value["title"] . "</a><br>";
}
?>