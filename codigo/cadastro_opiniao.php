<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<title>Cadastro de Opinião</title>
		<meta charset="UTF-8"/>
	</head>
	<body>
		<?php	
			include "menu.inc";
			include ("conexao.php");
			$nome_greve = $_POST["nome_greve"];
			$opcao = $_POST["opcao"];
			$opiniao = $_POST["opiniao"];
			
			$insert ="INSERT INTO opiniao (cod_greve,opcao,opiniao)
					VALUES ('$nome_greve','$opcao','$opiniao')";
			if(mysqli_query($link, $insert)){
				echo"Opinião Gravada com sucesso";
			}else{
				echo "Erro ao cadastrar<br/>";
				echo mysqli_error($link);
			}
		?>
	</body>
</html>