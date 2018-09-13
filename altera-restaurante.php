<?php
 include("cabecalho.php");         
 include("conecta.php");            
 include("banco-restaurante.php"); 

$id = $_POST ['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
if(array_key_exists('delivery', $_POST)) {
    $delivery = "true";
} else {
    $delivery = "false";
}

if(alteraRestaurante($conexao, $id, $nome, $preco, $descricao, $categoria_id, $delivery)) { ?>
    <p class="text-success">O restaurante <?= $nome ?>, foi alterado.</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O restaurante <?= $nome ?> não foi alterado: <?= $msg?></p>
<?php
}
?>

<?php include("rodape.php"); ?>