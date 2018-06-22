<!DOCTYPE html>
<html lang="pt-BR">

	<head>
		<title>Consequências</title>
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
			<form action="cadastro_efeitos.php" method="post" style="border:2px solid #ccc">
				<h2>Consequências da Greve</h2>
				
				<p>
					<label>Greve:</label>
					<select name="nome_greve">
						<?php
							include("conexao.php");
							$select = "SELECT * FROM greve ORDER BY nome_greve";
							$resultado = mysqli_query($link,$select) or die(mysqli_error($link));
							echo "<option value='Selecione'>Selecione</option>";
							while($linha=mysqli_fetch_array($resultado)){
								echo "<option value='".$linha['id_greve']."'>".$linha['nome_greve']."</option>";
							}
							
						?>
					</select>
				</p>
			
				<p>
					<div class="opcao_css">
						<label name= "opcao_efeitos">Você foi afetado?</label>
						<input type="radio" name="opcao_efeitos" value="Sim">Sim
						<input type="radio" name= "opcao_efeitos" value="Não">Não
					</div>
				</p>
					
				<p>
					<button class="button">Enviar</button>
				</p>
			</form>
		</div>
	</body>
</html>