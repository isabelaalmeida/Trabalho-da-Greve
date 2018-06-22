<!DOCTYPE html>
<html>
	<head>
		<title>Alteração de Efeitos</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
		<div class="conteudo">
			<?php
				include "menu.inc";
				include "conexao.php";
				$sql ="select * from efeitos WHERE id_efeitos =".$_GET["id_efeitos"];

				$resultado = mysqli_query($link,$sql) or die (mysqli_error($link));

				$linha = mysqli_fetch_array($resultado);
				$opcao_efeitos = $linha["opcao_efeitos"];
				$cod_greve=$linha["id_efeitos"];
			?> 
		</div>
		<div class="conteudo">
			<form method="POST"  action="alterando_efeitos.php" enctype="multipart/form-data">
				<div class="formulario">
					<label>Nome da Greve:</label>
						<select name="nome_greve">
					<?php
						$sql="SELECT * FROM greve ORDER BY nome_greve";
						$resultado= mysqli_query($link,$sql);
					
						while($linha=mysqli_fetch_array($resultado)){
							$id_greve=$linha["id_greve"];
							$nome_greve=$linha["nome_greve"];
							if($id_greve==$cod_greve){
								$selected ="selected";
							}
							else{
								$selected ="";
							}
							echo "<option value='$id_greve' $selected>$nome_greve</option>";
						}
				   ?>
					</select>
					<br/> <br/>
					<label name="opcao_efeitos">Foi Afetado?:</label>
						<?php
						$checked_sim = "";
						$checked_nao = "";
							if($opcao_efeitos=="Sim"){
								$checked_sim = "checked";
							}else{
								$checked_nao = "checked";
							}
						?>
					<input type="radio" name="opcao_efeitos" value="Sim" <?=$checked_sim;?>>Sim
					<input type="radio" name= "opcao_efeitos" value="Não" <?=$checked_nao;?>>Não
					</div>
				<input type="hidden" name="id_efeitos" value="<?=$_GET["id_efeitos"];?>" />
				<p>
					<button class="button">Alterar</button>
				</p>
			</form>
		</div>
	</body>
</html>