<!DOCTYPE html>
<html>
	<head>
		<title>Remoção de Greves</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<?php
			include ("conexao.php");
			include "menu.inc";
			$numero = $_GET["id_greve"];
			
			$delete ="DELETE FROM greve WHERE id_greve=$numero";

			if(mysqli_query($link,$delete)){
					header("location:listagem_greve.php");
			}
			else{
				echo"Ocorreu um erro: Você não pode Remover esta greve, pois ela está relacionada a alguma outra tabela.";
				echo "<br/>";
			}
		?>
	</body>
</html>