<?php
	include "conexao.php";
	$update ="UPDATE greve SET nome_greve='" . 
	$_POST["nome_greve"] . "', id_greve='" . 
	$_POST["id_greve"] . "', motivo='" . $_POST["motivo"] . "', pais='" . 
	$_POST["pais"] . "', ano='" . $_POST["ano_ocorrido"] . "' WHERE id_greve =".$_POST["id_greve"];
	$resultado = mysqli_query($link,$update) or die (mysqli_error($link));
	$linha = mysqli_fetch_array($resultado);
	header("location:listagem_greve.php");
?>