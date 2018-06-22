<!DOCTYPE html>
<html>
	<head>
		<title>Remoção de Pessoas</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<?php
			include ("conexao.php");
			include "menu.inc";
			$numero = $_GET["id_pessoa"];
			
			$delete ="DELETE FROM pessoas WHERE id_pessoa=$numero";

			if(mysqli_query($link,$delete)){
					header("location:listagem_pessoas.php");
			}
			else{
				echo"Ocorreu um erro: Você não pode apagar esta pessoa, pois ela está relacionada a alguma outra tabela.";
				echo "<br/>";
			}
		?>
	</body>
</html>