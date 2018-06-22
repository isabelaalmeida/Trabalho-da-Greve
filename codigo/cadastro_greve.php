<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<title>Cadastro de Greve</title>
		<meta charset="UTF-8"/>
	</head>
	<body>
		<?php	
			include "menu.inc";
			include ("conexao.php");
			$nome_greve = $_POST["nome_greve"];
			$motivo= $_POST["motivo_greve"];
			$ano = $_POST["ano"];
			$pais = $_POST["pais"];
			
			$insert ="INSERT INTO greve (nome_greve,motivo,ano,pais)
					VALUES ('$nome_greve','$motivo','$ano','$pais')";
			if(mysqli_query($link, $insert)){
				echo"Greve cadastrada com sucesso";
			}else{
				echo "Erro ao cadastrar<br/>";
				echo mysqli_error($link);
			}
		?>
	</body>
</html>