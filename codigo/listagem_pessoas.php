<!DOCTYPE html>
<html>
	<head>
		<title>Listagem de Pessoas</title>
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
					<th>Nome</th>
					<th>Emprego</th>
					<th>idade</th>
					<th>Ação</th>
				</tr>
								
			<form method='POST' action='listagem_pessoas.php'>
		
			<label>Filtrar Pessoa que comece com: </label>
			<input type = 'text' name = 'filtro'>
			<br/><br/>
			<input type='submit' value='Enviar'/>&nbsp;
			<input type='reset' value='Apagar'/>
			
			</form>
			<p>
			 <form name = 'ordenar' method = 'post' action ='listagem_pessoas.php'> 
			 <select name = 'ordenacao' onchange = 'document.ordenar.submit()'>
				<option>Ordenar por:</option>
				
				<option value = 'nome_a_z'>Nome país [A->Z]</option>
				<option value = 'nome_z_a'>Nome país [Z->A]</option>
				<option value = 'idade_1_100'>idade[1->100]</option>
				<option value = 'idade_100_1'>idade [100->1]</option>
			</select>
			</p>	
			</form>

		 <?php
		  
		  if(isset($_POST["filtro"])){
			$select = "SELECT * FROM pessoas where nome_pessoa like '$_POST[filtro]%'";	
		}
		else{
			$select = "SELECT * FROM pessoas nome_pessoa";
		}
		
		session_start();
		
		if(isset($_POST["ordenacao"]) || isset($_SESSION["ordenacao"])){
			
			if(isset($_POST["ordenacao"])){
				$_SESSION["ordenacao"] = $_POST["ordenacao"];
			}	
			
			switch($_SESSION["ordenacao"]){
				
				
				case "nome_a_z";
					$select.= " ORDER BY nome_pessoa";
					break;
				
				case "nome_z_a";
					$select.= " ORDER BY nome_pessoa DESC";
					break;
					
				
				case "idade_1_100";
					$select.= " ORDER BY idade";
					break;
				
				case "idade_100_1_z_a";
					$select.= " ORDER BY idade DESC";
					break;
			}				
		}	
				
					include ("conexao.php");
					
					
					$resultado = mysqli_query($link,$select)or die (mysqli_error($link));
					
					while ($tupla = mysqli_fetch_array($resultado)){
						$id = $tupla["id_pessoa"];
						echo "<tr>
								<td>" .$tupla["nome_pessoa"]. "</td>
								<td>" .$tupla["emprego"]. "</td>
								<td>" .$tupla["idade"]. "</td>
								<td> <a href='alterar_pessoa.php?id_pessoa=$id'>Alterar/</a>
								<a href='remover_pessoa.php?id_pessoa=$id'>Remover</a> </td>
							</tr>";
							
					}
				?>
			</table>
		</div>
	</body>
</html>