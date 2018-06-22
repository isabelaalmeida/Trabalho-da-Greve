<!DOCTYPE html>
<html>
	
	<head>
		<title>Listagem de Greve</title>
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
			<table border="1">
				<tr>
					<th>Nome da Greve</th>
					<th>Motivo</th>
					<th>País</th>
					<th>Ano</th>
					<th>Ação</th>
				</tr>
								
			<form method='POST' action='listagem_greve.php'>
		
			<label>Filtrar greve que comece com: </label>
			<input type = 'text' name = 'filtro'>
			<br/><br/>
			<input type='submit' value='Enviar'/>&nbsp;
			<input type='reset' value='Apagar'/>
			
			</form>
			<p>
			 <form name = 'ordenar' method = 'post' action ='listagem_greve.php'> 
			 <select name = 'ordenacao' onchange = 'document.ordenar.submit()'>
				<option>Ordenar por:</option>
				
				<option value = 'nome_a_z'>Nome greve [A->Z]</option>
				<option value = 'nome_z_a'>Nome greve [Z->A]</option>
				<option value = 'pais_a_z'>país[A->Z]</option>
				<option value = 'pais_z_a'>país [Z->A]</option>
			</select>
			</p>	
			</form>

		 <?php
		  
		  if(isset($_POST["filtro"])){
			$select = "SELECT * FROM greve where nome_greve like '$_POST[filtro]%'";	
		}
		else{
			$select = "SELECT * FROM greve nome_greve";
		}
		
		session_start();
		
		if(isset($_POST["ordenacao"]) || isset($_SESSION["ordenacao"])){
			
			if(isset($_POST["ordenacao"])){
				$_SESSION["ordenacao"] = $_POST["ordenacao"];
			}	
			
			switch($_SESSION["ordenacao"]){
				
				
				case "nome_a_z";
					$select.= " ORDER BY nome_greve";
					break;
				
				case "nome_z_a";
					$select.= " ORDER BY nome_greve DESC";
					break;
					
				
				case "pais_a_z";
					$select.= " ORDER BY pais";
					break;
				
				case "pais_z_a";
					$select.= " ORDER BY pais DESC";
					break;
			}				
		}	
				
					include ("conexao.php");
					
					
					$resultado = mysqli_query($link,$select)or die (mysqli_error($link));
					
					while ($tupla = mysqli_fetch_array($resultado)){
						$id = $tupla["id_greve"];
						echo "<tr>
								<td>" .$tupla["nome_greve"]. "</td>
								<td>" .$tupla["motivo"]. "</td>
								<td>" .$tupla["pais"]. "</td>
								<td>" .$tupla["ano"]. "</td>
								<td> <a href='alterar_greve.php?id_greve=$id'>Alterar/</a>
								<a href='remover_greve.php?id_greve=$id'>Remover</a> </td>
							</tr>";
							
					}
				?>
			</table>
		</div>
	</body>
</html>