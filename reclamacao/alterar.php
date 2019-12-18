<!DOCTYPE html>
<html>
<head>
	<title>Reclamações - Tucumã</title>
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
			
			<a class="navbar-brand" href="../index.html"><img src="..\imagens\logo.png" alt="logo"></a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSite">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item mr-5">
						<a class="nav-link" href="menu.html">Reclame</a>
					</li>
					<li class="nav-item mr-5">
						<a class="nav-link" href="..\kids.html">Kids</a>
					</li>
					<li class="nav-item mr-5">
						<a class="nav-link" href="..\vs.html">Você Sabia?</a>
					</li>
					<li class="nav-item mr-5">
						<a class="nav-link" href="..\projetos.html">Projetos</a>
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
							<a href='menu.html'>Fazer nova reclamação</a>
							<p></p>
						</div>
						<div class="col-3 linha">
							<p></p>
							<a href='consulta.html'>Consultar reclamação</a>
							<p></p>
						</div>
						<div class="col-3 linha" id="ativo">
							<p></p>
							<a href='alterar.html'>Alterar dados da	reclamação</a>
							<p></p>
						</div>
						<div class="col-3">
							<p></p>
							<a href='excluir.html'>Excluir reclamação</a>
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="formularios">
		<div class="container">
			<div class="row text-center mt-5 mb-4">
				<div class="col-12">
					<h1>Portal de Reclamações Tucumã</h1>
				</div>
			</div>
		</div>

	<div class="container">

<?php
	include_once('conexao.php');//Conetando a página com o banco de dados através do arquivo 'conexao.php'
		
		//Recebimento de dados da página de alteração da reclamacao via método POST
		$codigo = $_POST['codigo'];
		$campo = $_POST['campo'];
		$atualizacao = $_POST['atualizacao'];
		if(empty($campo)){
			echo "<script type=\"text/javascript\">window.location='../reclamacao/menu.html';alert('Por favor, informe o campo a ser alterado!!!')</script>";
		}
		//Verificando se o código existe no banco de dados
		$select = "select ID from reclamacoes where ID = '$codigo'"; 

			$resultado1 = @mysqli_query($conexao, $select);
				if(!$resultado1){
					echo '<input type="button" onclick="window.location='."index.html'".';" value="Voltar"><br><br>';
					die('<b>Query Inválida:</b>'. @mysqli_error($conexao));
				} else {
					$num = @mysqli_num_rows($resultado1);
						if ($num==0){
							echo "<b>Código </b>Não localizado!!!!<br><br>";
							echo '<input type="button" onclick="window.location='."'alterar.html'".';" value="Voltar" id="botaoForm"><br><br>';
							exit;
						} 
				} 
		//criando a linha para atualizar o banco de dados com a infomação fornecida pelo usuário.
		$update = "Update reclamacoes set $campo = '$atualizacao' where ID = '$codigo' ";
		//Fazendo uma consulta entre a conexão e o update
		$resultado = @mysqli_query($conexao, $update);
			if(!$resultado){//Se der algo errado entre conexão ou update, retorna o erro
				echo '<input type="button" onclick="window.location='."index.html'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>'. @mysqli_error($conexao));
			} else { //Se der tudo certo, altera a reclama~~ao
				$num = @mysqli_num_rows($resultado);
					if ($num==0){
						echo "<center>Reclamação alterada com sucesso!!!!</center>";
						echo '<input type="button" onclick="window.location='."'../index.html'".';" value="Voltar" id="botaoForm" class="mt-3"><br><br></div></div>

							<!--transição-->
							<img src="..\imagens\transicao3.png" class="img-fluid um margem">
							
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
												"A natureza fez o homem feliz e bom, mas a sociedade deprava-o e torna-o miserável." - Jean-Jacques Rousseau
											</span>
											<br>
											<br>
											<p>Todos os direitos reservados SDPN</p>
											<a href="../i-index.html"><img src="..\imagens/bandeira_usa.png"></a>
											<a href="../index.html"><img src="..\imagens/bandeira_br.png"></a>
										</div>
										<div class="col-12 col-sm-4"><br>
											<label>Contato:</label>
											<form action="sugestao.php" method="POST">
												<input type="text" name="nome" placeholder="Nome..." class="mb-3" required><br>
												<input type="text" name="cidade" placeholder="Cidade..." class="mb-3" required><br>
												<textarea name="sugestao" placeholder="Deixe sua mensagem..."  maxlength="1000" required></textarea>
												<br>
												<div class="text-right mb-2">
													<label>Máximo 1000 caracteres</label>
												</div>
												<input type="submit" value="ENVIAR" class="mb-3" id="botaoRod">
											</form>
										</div>
									</div>
								</div>
							</div>



						';
						exit;
					} 
			}
	mysqli_close($conexao);//Fechando a conexão
?>


	<script type="text/javascript" src="bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap\bootstrap.bundle.min.js"></script>

</body>
</html>