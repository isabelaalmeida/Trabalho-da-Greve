<!DOCTYPE html>
<html>
	<head>
		<title>Alteração de Pessoas</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
		<div class="conteudo"/>
				<?php

				include "menu.inc";
				include "conexao.php";
				$sql ="select * from pessoas WHERE id_pessoa =".$_GET["id_pessoa"];

				$resultado = mysqli_query($link,$sql) or die (mysqli_error($link));

				$linha = mysqli_fetch_array($resultado);

				$cod_pessoa=$linha["id_pessoa"];
				?> 
		</div>
		<div class="conteudo"/>	
			<form method="POST"  action="alterando_pessoa.php" enctype="multipart/form-data">
				<label>Nome da Pessoa:</label>
				<input type="text" name="nome_pessoa" value="<?=$linha["nome_pessoa"]?>" />
				<br/> <br/>
				<label>Emprego:</label>
				<input type="text" name="emprego" value="<?=$linha["emprego"]?>"/>
				<br/> <br/>
				<label>Idade:</label>
				<input type="number" name="idade" value="<?=$linha["idade"]?>"/>
				<br/> <br/>
				<input type="hidden" name="id_pessoa" value="<?=$_GET["id_pessoa"];?>" />
				<p>
					<button class="button">Alterar</button>
				</p>
			</form>
		</div>
	</body>
</html>