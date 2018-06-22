<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<title>Cadastro de Efeitos</title>
		<meta charset="UTF-8"/>
	</head>
	<body>
		<?php	
			include "menu.inc";
			include ("conexao.php");
			$nome_greve = $_POST["nome_greve"];
			$opcao_efeitos= $_POST["opcao_efeitos"];
			
			$insert ="INSERT INTO efeitos (cod_greve,opcao_efeitos)
					VALUES ('$nome_greve','$opcao_efeitos')";
			if(mysqli_query($link, $insert)){
				echo"Efeito cadastrado com sucesso";
			}else{
				echo "Erro ao cadastrar<br/>";
				echo mysqli_error($link);
			}
		?>
	</body>
</html>