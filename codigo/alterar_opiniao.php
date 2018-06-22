<!DOCTYPE html>
<html>
	<head>
		<title>Alteração de Opiniões</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
		<div class="conteudo">
			<?php
				include "menu.inc";
				include "conexao.php";
				$sql ="SELECT * FROM opiniao WHERE id_opiniao =".$_GET["id_opiniao"];

				$resultado = mysqli_query($link,$sql) or die (mysqli_error($link));

				$linha = mysqli_fetch_array($resultado);
				$opiniao = $linha["opiniao"];
				$opcao = $linha["opcao"];
				$cod_opiniao=$linha["id_opiniao"];
			?>
		</div>
		<div class="conteudo">
			<form method="POST"  action="alterando_opiniao.php" enctype="multipart/form-data">
				<label>Nome da Greve:</label>
				<select name="cod_greve">
				<?php
					$sql="SELECT * FROM greve ORDER BY nome_greve";
					$resultado= mysqli_query($link,$sql);
				
					while($linha=mysqli_fetch_array($resultado)){
						$id_greve=$linha["id_greve"];
						$nome_greve=$linha["nome_greve"];
						if($id_greve==$cod_opiniao){
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
				<label>A Favor?:</label>
				<?php
				$checked_sim = "";
				$checked_nao = "";
					if($opcao=="Sim"){
						$checked_sim = "checked";
					}else{
						$checked_nao = "checked";
					}
				?>
				<input type="radio" name="opcao" value="Sim" <?=$checked_sim;?>>Sim
				<input type="radio" name= "opcao" value="Não" <?=$checked_nao;?>>Não
				<br/><br/>
				<label>Opinião:</label>	
				<textarea name="opiniao" type="text" style="height:160px"><?=$opiniao;?></textarea>
				<input type="hidden" name="id_opiniao" value="<?=$_GET["id_opiniao"];?>" />
				<p>
					<button class="button">Alterar</button>
				</p>
			</form>
		</div>
	</body>
</html>