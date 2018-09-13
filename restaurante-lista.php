
<?php 
include("cabecalho.php"); 
include("conecta.php"); 
include("banco-restaurante.php"); ?>

<?php if(array_key_exists("removido", $_GET) && $_GET['removido']=='true') { ?>
<p class="alert-success">Restaurante apagado com sucesso.</p>
<?php } ?>

<table class="table table-striped table-bordered"> 

	<?php
		$restaurantes = listaRestaurantes($conexao);
		foreach ($restaurantes as $restaurante):
		?>
	<tr>
		<td><?= $restaurante['nome']?></td>
		<td><?= $restaurante['preco']?></td>
		<td><?= substr($restaurante['descricao'], 0, 40)?></td>
		<td><?= $restaurante['categoria_nome']?></td>
		<td><a class="btn btn-primary" 
		href="restaurante-altera-formulario.php?id=<?=$restaurante['id']?>">alterar</a></td> <!--Botão alterar-->
		<td>
			<form action="remove-restaurante.php" method= "post"> <!--removi o parâmetro anterior e criamos um formulário na linha de baixo-->
			<input type="hidden" name="id" value="<?=$restaurante['id']?>">
            <button class="btn text-danger">remover</a>
            </form>
        </td>
	</tr> 
	<?php 
		endforeach
	?>
	 
</table>

<?php include ("rodape.php"); ?>
