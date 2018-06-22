<?php
	include "conexao.php";
	$update ="UPDATE opiniao SET cod_greve='" . $_POST["cod_greve"] . "', id_opiniao='" . 
	$_POST["id_opiniao"] . "', opiniao='" . $_POST["opiniao"] . "', opcao='" . 
	$_POST["opcao"] . "' WHERE id_opiniao =".$_POST["id_opiniao"];
	$resultado = mysqli_query($link,$update) or die (mysqli_error($link));
	$linha = mysqli_fetch_array($resultado);
	header("location:listagem_opiniao.php");
?>