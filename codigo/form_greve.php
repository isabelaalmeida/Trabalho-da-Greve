<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Cadastro da Greve</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
	<h1>Greve Site</h1>
		<div class="conteudo">
			<?php
				include "menu.inc";
				include "conexao.php";
			?>
		</div>
		<div class="conteudo">
			<form action="cadastro_greve.php" method="post" style="border:2px solid #ccc">
				<h2>Contextualização</h2>
				<p>
					<label>Nome da Greve:</label>
					<input type="text" name="nome_greve" placeholder="Ex: Caminhoneiros">
				</p>
				<p>
					<label>Motivo:</label>
					<input type="text" name="motivo_greve" placeholder="Ex: Combustível">
				</p>
				<p>
					<label>País:</label>
					<input type="text" name="pais" placeholder="Ex: Brasil">
				</p>
				<p>
					<label>Ano Ocorrido:</label>
					<input type="date" name="ano">
				</p>
				<p>
					<button class="button">Enviar</button>
				</p>
			</form>
		</div>
	</body>
</html>