<?php
	include "conexao.php";
	$update ="UPDATE pessoas SET nome_pessoa='" . 
	$_POST["nome_pessoa"] . "', id_pessoa='" . 
	$_POST["id_pessoa"] . "', emprego='" . $_POST["emprego"] . "', idade='" . 
	$_POST["idade"] . "' WHERE id_pessoa =".$_POST["id_pessoa"];
	$resultado = mysqli_query($link,$update) or die (mysqli_error($link));
	$linha = mysqli_fetch_array($resultado);
	header("location:listagem_pessoas.php");
?>