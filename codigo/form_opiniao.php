<!DOCTYPE html>
<html lang="pt-BR">

	<head>
		<title>Formulário de Opiniões</title>
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
			<form action="cadastro_opiniao.php" method="post" style="border:2px solid #ccc">
			
			<h2>Minha Opinião!</h2>
				
				<p>
					<label>Greve:</label>
					<select name="nome_greve">
					<?php
						include("conexao.php");
						$select = "SELECT * FROM greve ORDER BY nome_greve";
						$resultado = mysqli_query($link,$select) or die(mysqli_error($link));
						while($linha=mysqli_fetch_array($resultado)){
							echo "<option value='".$linha['id_greve']."'>".$linha['nome_greve']."</option>";
						}
					
					?>
				</select>
				</p>
				
				<p>
				<div class="opcao_css">
					<label name="opcao">Está de acordo  com a Greve?:</label>
					<input type="radio" name="opcao" value="Sim">Sim
					<input type="radio" name= "opcao" value="Não">Não
					<br/>

				</div>
				<p>
				<div class="mensagem_css">
					<label >Deixe sua Mensagem!</label>
					<br/>
					<textarea name="opiniao" type="text" placeholder="Deixe aqui sua opinião" 
					style="height:160px" max="300"></textarea>

				
				</div>
			
				<p>
					<button class="button">Enviar</button>
				</p>
			
			</form>
		</div>
	</body>
</html>