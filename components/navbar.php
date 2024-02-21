<!-- <nav class="navbar">
    <ul>
        <li><a href="#"> <i class="fas fa-home"></i> Portal</a></li>
        <li><a href="#"> <i class="fas fa-book"></i> Base de dados</a></li>
        <li><a href="#"> <i class="fas fa-plus"></i> Adicionar livros</a></li>
        <li><a href="#"> <i class="fas fa-table"></i> Importar excel</a></li>
    </ul>
</nav> -->

<?php 
  include "data.php";
?>

<div style="overflow: hidden;height: 40px"> 
    <nav class="navbar">
      <a href="#" class="brand">
        <span>Book sorter app</span>
      </a>
    
      <input id="bmenub" type="checkbox" class="show">
      <label for="bmenub" class="burger pseudo button">Opções</label>
    
      <div class="menu">
        <a href="/<?php echo $arrConfig["webName"] ?>/index.php" class="pseudo button icon-picture"><i class="fas fa-home"></i> Portal</a>
        <a href="/<?php echo $arrConfig["webName"] ?>/library.php" class="pseudo button icon-puzzle"><i class="fas fa-book"></i> Biblioteca pessoal</a>
        <a href="/<?php echo $arrConfig["webName"] ?>/actions/add_book.php" class="pseudo button icon-puzzle"> <i class="fas fa-plus"></i> Adicionar livros </a>
        <a href="#" class="pseudo button icon-puzzle"> <i class="fas fa-table"></i> Importar excel </a>
        <a href="/<?php echo $arrConfig["webName"] ?>/actions/logout.php" class="pseudo button icon-puzzle"> <i class="fa fa-arrow-left"></i> Sign out </a>
      </div>
    </nav>
    
    </div>
    