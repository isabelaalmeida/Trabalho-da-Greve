<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<title>Cadastro de Pessoas</title>
		<meta charset="UTF-8"/>
	</head>
	<body>
		<?php	
			include "menu.inc";
			include ("conexao.php");
			$nome_pessoa = $_POST["nome_pessoa"];
			$emprego= $_POST["emprego_pessoa"];
			$idade = $_POST["idade_pessoa"];
			
			$insert ="INSERT INTO pessoas (nome_pessoa,emprego,idade)
					VALUES ('$nome_pessoa','$emprego','$idade')";
			if(mysqli_query($link, $insert)){
				echo"Você foi cadastrado com sucesso";
			}else{
				echo "Erro ao cadastrar<br/>";
				echo mysqli_error($link);
			}
		?>
	</body>
</html>