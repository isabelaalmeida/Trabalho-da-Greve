<!DOCTYPE html>
<html>
	<head>
		<title>Alteração de Greves</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
		<div class="conteudo">
			<?php
				include "menu.inc";
				include "conexao.php";
				$sql ="select * from greve WHERE id_greve =".$_GET["id_greve"];

				$resultado = mysqli_query($link,$sql) or die (mysqli_error($link));

				$linha = mysqli_fetch_array($resultado);

				$cod_greve=$linha["id_greve"];
			?> 
		</div>
		<div class="conteudo">
			<form method="POST"  action="alterando_greve.php" enctype="multipart/form-data">
			<div class="formulario">
				<label>Nome da Greve:</label>
				<input type="text" name="nome_greve" value="<?=$linha["nome_greve"]?>" />
				<br/> <br/>
				<label>Motivo:</label>
				<input type="text" name="motivo" />
				<br/> <br/>
				<label>País:</label>
				<input type="text" name="pais" />
				<br/> <br/>
				<label>Ano Ocorrido:</label>
				<input type="text" name="ano_ocorrido" />
				<br/> <br/>
				</div>
				<input type="hidden" name="id_greve" value="<?=$_GET["id_greve"];?>" />
				<p>
					<button class="button">Alterar</button>
				</p>
			</form>
		</div>
	</body>
</html>