<!DOCTYPE html>
<html>
<head>
	<title>Complaints - Tucumã</title>
	<link rel="icon" type="imagem/png" href="../imagens/meufavicon.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="..\index12.css">
	<link rel="stylesheet" type="text/css" href="..\bootstrap\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="..\bootstrap\all.min.css">
	<link rel="stylesheet" type="text/css" href="..\bootstrap\fontawesome\css\all.css">
</head>
<body>
	<!--navbar-->
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			
			<a class="navbar-brand" href="../i-index.html"><img src="..\imagens\logo.png" alt="logo"></a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSite">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item mr-5">
						<a class="nav-link" href="i-menu.html">Complain</a>
					</li>
					<li class="nav-item mr-5">
						<a class="nav-link" href="..\i-kids.html">Kids</a>
					</li>
					<li class="nav-item mr-5">
						<a class="nav-link" href="..\i-vs.html">Did you Know?</a>
					</li>
					<li class="nav-item mr-5">
						<a class="nav-link" href="..\i-projetos.html">Projects</a>
					</li>
				</ul>
			</div>
		
		</div>
	</nav>

	<div class="marrom">
		<img src="../imagens/transicao_denuncia.png" alt="transição" class="um transicao">
		<br>
		<div class="reclamacoes">
			<div class="container-fluid">
				<div class="container">
					<div class="row text-center">
						<div class="col-3 linha">
							<p></p>
							<p></p>
							<a href='i-menu.html'>Make new complaint</a>
							<p></p>
						</div>
						<div class="col-3 linha" id="ativo">
							<p></p>
							<a href='i-consulta.html'>See Complaint</a>
							<p></p>
						</div>
						<div class="col-3 linha">
							<p></p>
							<a href='i-alterar.html'>Change complaint data</a>
							<p></p>
						</div>
						<div class="col-3">
							<p></p>
							<a href='i-excluir.html'>Delete Complaint</a>
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="formularios">
		<div class="container">
			<div class="row text-center mt-5 mb-5">
				<div class="col-12">
					<h1>Tucumã Complaints Portal</h1>
				</div>
			</div>
		</div>

	<div class="container">

<?php
	include_once('i-conexao.php');
			
			$codigo = $_POST['codigo'];
			//Verificando se o código existe no banco de dados
			$select = "select * from reclamacoes where ID = '$codigo' or RESPOSTA_SEGURANCA = '$codigo'";
			
			$resultado = @mysqli_query($conexao, $select);
				if(!$resultado){
					echo '<input type="button" onclick="window.location='."./i-consulta.html'".';" value="Back"><br><br>';
					die('<b>Invalid query:</b>'. @mysqli_error($conexao));
				} else {
					$num = @mysqli_num_rows($resultado);
						if ($num==0){
							echo "<b>Code </b>Not located!!!!<br><br>";
							echo '<input type="button" onclick="window.location='."'i-consulta.html'".';" value="Back" id="botaoForm"><br><br>';
							exit;
						}else{
							$dados=mysqli_fetch_array($resultado);
						}
				}
	mysqli_close($conexao);
?>	
	<div class="row">
		<div class="col-12">
			<label>Complaint Code:</label>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mb-4">
			<input type="text" value="<?php echo $dados['ID'];?>" readonly>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<label>Addressee of Complaint</label>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mb-4">
			<input type="text"  value="<?php echo $dados['DESTINO'];?>"readonly>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<label>Subject matter:</label>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mb-4">
			<input type="text" size="190"   value="<?php echo $dados['RECLAMACAO'];?>" readonly>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<label>City where the crime occurred:</label>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mb-4">
			<input type="text" size="190"   value="<?php echo $dados['CIDADE'];?>" readonly>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<label>Neighborhood:</label>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mb-4">
			<input type="text" size="190" value="<?php echo $dados['BAIRRO'];?>" readonly>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<label>Crime scene:</label>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mb-4">
			<input type="text" size="190"   value="<?php echo $dados['LOCALIDADE'];?>" readonly>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<label>Person involved</label>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mb-4">
			<input type="text" size="190"   value="<?php echo $dados['PESSOA_ENVOLVIDA']; if($dados['PESSOA_ENVOLVIDA']==""){echo"Person involved is not public";}?>" readonly>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<label>Attachment Sent:</label>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mb-4">
			<?php 
			//Verificando se existe anexo no registo. Se sim, exibe o anexo, senão, exibe a mensagem que não tem anexo
				$diretorio='./arquivos/'; 
				$nome = $dados['ID'];
				$teste = $diretorio.$nome;
					if ((!isset($teste)) || (empty($teste)) || (is_null($teste)) || ((!file_exists($teste)))) {
						echo"<input type='text' size='190' value='There were no attachments to this record' readonly>";
					} else {
						echo"<input type='image' src=".$diretorio.$dados['ID']." readonly>";
					}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mb-4">
			<label>Security question:</label>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mb-4">
			<input type="text" size="190" value="<?php echo $dados['PERGUNTA_SEGURANCA'];?>" readonly>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<label>answer:</label>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mb-5">
			<input type="text" size="190" value="<?php echo $dados['RESPOSTA_SEGURANCA'];?>" readonly>
		</div>
	</div>
	
	<div class="row mb-5">
		<div class="col-4">
			<input type='button' onclick="window.location='../i-index.html';" value="Return to home page" id="botaoForm">
		</div>
		<div class="col-4">
			<input type='button' onclick="window.location='i-excluir.html';" value="Cancel Complaint" id="botaoForm">
		</div>
	</div>

	</div>
</div>

<!--transição-->
	<img src="..\imagens\transicao3.png" class="img-fluid um margem" id="vsTransicao">


	<!--rodapé-->
	<div class="rodape">
		<div class="container">
			<div class="row">
				<div class="col-3">
					<ul>
						<img src="..\imagens/logo_reduzida.png" class="mt-4">
					</ul>
				</div>
				<div class="col-8 col-sm-5 mt-5">
					<span>
						"Nature has made man happy and good, but society deprives him and makes him miserable." - Jean-Jacques Rousseau
					</span>
					<br>
					<br>
					<p>All rights reserved to SDPN</p>
					<a href="../i-index.html"><img src="../imagens/bandeira_usa.png"></a>
					<a href="../index.html"><img src="../imagens/bandeira_br.png"></a>
				</div>
				<div class="col-12 col-sm-4"><br>
					<label>Contact:</label>
					<form action="i-sugestao.php" method="POST">
						<input type="text" name="nome" placeholder="Name..." class="mb-3" required><br>
						<input type="text" name="cidade" placeholder="City..." class="mb-3" required><br>
						<textarea name="sugestao" placeholder="Leave your message..."  maxlength="1000" required></textarea>
						<br>
						<div class="text-right mb-2">
							<label>1000 characters max</label>
						</div>
						<input type="submit" value="SEND" class="mb-3" id="botaoRod">
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>

	<script type="text/javascript" src="bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap\bootstrap.bundle.min.js"></script>

</body>
</html>