<?php 
include("cabecalho.php");
include("conecta.php");
include("banco-restaurante.php");

$id = $_POST['id'];
removeRestaurante($conexao, $id);
header("Location: restaurante-lista.php?removido=true"); //sempre utilizar o die(); após o Location 
die(); //serve para finalizar aqui
?>

<?php
include("rodape.php");
?>


