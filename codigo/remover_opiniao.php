<!DOCTYPE html>
<html>
	<head>
		<title>Remoção de Opiniões</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<?php
			include ("conexao.php");
			include "menu.inc";
			$numero = $_GET["id_opiniao"];
			
			$delete ="DELETE FROM opiniao WHERE id_opiniao=$numero";

			if(mysqli_query($link,$delete)){
					header("location:listagem_opiniao.php");
			}
			else{
				echo"Ocorreu um erro: Você não pode Remover esta Opinião, pois ela está relacionada a alguma outra tabela.";
				echo "<br/>";
			}
		?>
	</body>
</html>