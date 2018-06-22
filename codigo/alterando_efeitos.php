<?php
	include "conexao.php";
	$update ="UPDATE efeitos SET nome_greve='" . 
	$_POST["nome_greve"] . "' opcao_efeitos='" . $_POST["opcao_efeitos"].
	"' WHERE id_efeitos =".$_POST["opcao_efeitos"];
	$resultado = mysqli_query($link,$update) or die (mysqli_error($link));
	$linha = mysqli_fetch_array($resultado);
	header("location:listagem_efeitos.php");
?>