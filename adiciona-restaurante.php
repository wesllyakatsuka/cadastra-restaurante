<?php 
include("cabecalho.php");
include("banco-restaurante.php"); 
include("conecta.php"); 

$nome = $_POST ['nome'];
$preco = $_POST ['preco']; 
$descricao = $_POST ['descricao'];
$categoria_id = $_POST ['categoria_id'];
if (array_key_exists('delivery', $_POST)){
	$delivery = "true"; // O uso das "" no true é porque estamos interpolando
}else {
	$delivery = "false"; // O uso das "" no false é porque estamos interpolando
}


if(insereRestaurante($conexao, $nome, $preco, $descricao, $categoria_id, $delivery)) { ?>
	<p class="text-sucess">O Restaurante: "<?= $nome ?>" foi adicionado com sucesso!</p>
<?php } else { 
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O Restaurante: "<?= $nome ?>" não foi adicionado com sucesso!: <? = $msg?></p>
<?php
}
?>

<?php include("rodape.php"); ?>