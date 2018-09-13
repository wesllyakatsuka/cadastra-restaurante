<?php
include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");

$categorias = listaCategorias($conexao);
?>
	<h1>Cadastro de Restaurante</h1>

	<html>
    <form action="adiciona-restaurante.php" method="post">
        <table class="table">
            <tr>
                <td>Nome</td>
                <td><input type="text" class="form-control" name="nome" /></td>
            </tr>

            <tr>
                <td>Preço</td>
                <td><input type="number" class="form-control" name="preco" /></td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><textarea name="descricao" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td> </td>
                <td><input type="checkbox" name="delivery" value="true"> Entrega em domicílio</td>
            </tr>

            <tr>
                <td>Categoria</td>
                <td>
                    <select name="categoria_id" class="form-control">
                    <?php foreach($categorias as $categoria) : ?>
                    <option value="<?=$categoria['id']?>">
                        <?=$categoria['nome']?>
                        </option>
                    <?php endforeach ?>
                    </select>
                </td>
            </tr>
                  
            <tr>
                <td><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
            </tr>

        </table>

    </form>
</html>

<?php include("rodape.php"); ?>

