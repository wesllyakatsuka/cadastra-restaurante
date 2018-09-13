<?php 
include("cabecalho.php"); 
include("conecta.php");
include("banco-categoria.php");
include("banco-restaurante.php");

$id = $_GET['id'];
$restaurante = buscaRestaurante($conexao, $id);

$categorias = listaCategorias($conexao);

$delivery = $restaurante['delivery'] ? "checked='checked'" : "";
?>
            
    <h1>Alterando restaurante</h1>
    <form action="altera-restaurante.php" method="post">
        <input type="hidden" name="id" value="<?=$restaurante['id']?>" />
        <table class="table">
            <tr>
                <td>Nome</td>
                <td> <input class="form-control" type="text" name="nome" value="<?=$restaurante['nome']?>"></td>

            </tr>
            <tr>
                <td>Preço</td>
                <td><input  class="form-control" type="number" name="preco" value="<?=$restaurante['preco']?>"></td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><textarea class="form-control" name="descricao" ><?= $restaurante ['descricao']?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="delivery" <?=$delivery?> value="true"> delivery
            </tr>

            <tr>
                <td>Categoria</td>
                <td>
                    <select name="categoria_id" class="form-control">
                    <?php 

                        foreach($categorias as $categoria) : 
                            $essaEhACategoria = $restaurante['categoria_id'] == $categoria['id'];
                            $selecao = $essaEhACategoria ? "selected='selected'" : "";

                    ?>
                        <option value="<?=$categoria['id']?>" <?=$selecao?>>
                                <?=$categoria['nome']?>
                        </option>
                    <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">Alterar</button>
                </td>
            </tr>
        </table>
    </form>
<?php include("rodape.php"); ?>