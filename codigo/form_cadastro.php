<!DOCTYPE html>
<html lang="pt-BR">

	<head>
		<title>Cadastro de Pessoas</title>
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
			<form action="cadastro_pessoa.php" method="post" style="border:2px solid #ccc">
			<h2>Meu Cadastro!</h2>
				<div class="formulario">
					<label>Nome</label>
					<input type="text" placeholder="Nome Completo" name="nome_pessoa"/>
					<br/>
					<br/>
					<label>Qual é seu Emprego?:</label>
					<input type="text" placeholder="Ex: Professor" name="emprego_pessoa"/>
					<br/>
					<br/>
					<label>Idade:</label>
					<input type="number" name="idade_pessoa"/>
					<br/>
					<br/>
				</div>
				<p>
					<button class="button">Enviar</button>
				</p>
			</form>
		</div>
	</body>
</html>