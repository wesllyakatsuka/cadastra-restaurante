<?php

function listaRestaurantes($conexao){
	$restaurantes = array();
	$resultado = mysqli_query($conexao, "select r.*, c.nome as categoria_nome from restaurantes as r join categorias as c on r.categoria_id = c.id");
	while($restaurante = mysqli_fetch_assoc($resultado)) {
  		array_push($restaurantes, $restaurante);
	}
	return $restaurantes;

}

function insereRestaurante($conexao, $nome, $preco, $descricao, $categoria_id, $delivery) {
	$query = "insert into restaurantes (nome, preco, descricao, categoria_id, delivery) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$delivery})"; // '' são usadas em strings.  
	return mysqli_query($conexao, $query);
}

function alteraRestaurante($conexao, $id, $nome, $preco, $descricao, $categoria_id, $delivery) {
    $query = "update restaurantes set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', 
        categoria_id= {$categoria_id}, delivery = {$delivery} where id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function buscaRestaurante($conexao, $id) {
    $query = "select * from restaurantes where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function removeRestaurante($conexao, $id) {
    $query = "delete from restaurantes where id = {$id}";
    return mysqli_query($conexao, $query);
}

?>