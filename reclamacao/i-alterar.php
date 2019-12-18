<!DOCTYPE html>
<html>
<head>
	<title>Complaians - Tucumã</title>
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
						<div class="col-3 linha">
							<p></p>
							<a href='i-consulta.html'>See Complaint</a>
							<p></p>
						</div>
						<div class="col-3 linha" id="ativo">
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
			<div class="row text-center mt-5 mb-4">
				<div class="col-12">
					<h1>Tucumã Complaints Portal</h1>
				</div>
			</div>
		</div>

	<div class="container">

<?php
	include_once('i-conexao.php');

		$codigo = $_POST['codigo'];
		$campo = $_POST['campo'];
		$atualizacao = $_POST['atualizacao'];
		
		if((empty($campo))){ //Verifica se os campos "Órgão de destino" e "Pergunta de segurança" estão preechidos, caso não, retorna um alerta pedindo para o usuário preencher
			echo "<script type=\"text/javascript\">window.location='../reclamacao/i-menu.html';alert('Please, write the Destine Organ and the Security Question!!!')</script>";
		}
		//Verificando se o código existe no banco de dados
		
		$select = "select ID from reclamacoes where ID = '$codigo'"; 

			$resultado1 = @mysqli_query($conexao, $select);
				if(!$resultado1){
					echo '<input type="button" onclick="window.location='."i-alterar.html'".';" value="Back" ><br><br>';
					die('<b>Invalid query:</b>'. @mysqli_error($conexao));
				} else {
					$num = @mysqli_num_rows($resultado1);
						if ($num==0){
							echo "<b>Code </b>Not localized!!!!<br><br>";
							echo '<input type="button" onclick="window.location='."'i-alterar.html'".';" value="Back" id="botaoForm"><br><br>';
							exit;
						} 
				} 
		//criando a linha para atualizar o banco
		$update = "Update reclamacoes set $campo = '$atualizacao' where ID = '$codigo' ";
		
		$resultado = @mysqli_query($conexao, $update);
			if(!$resultado){
				echo '<input type="button" onclick="window.location='."i-index.html'".';" value="Back"><br><br>';
				die('<b>Invalid query:</b>'. @mysqli_error($conexao));
			} else {
				$num = @mysqli_num_rows($resultado);
					if ($num==0){
						echo "<center>Complaint successfully changed!!!!</center>";
						echo '<input type="button" onclick="window.location='."'../i-index.html'".';" value="Back" id="botaoForm" class="mt-3"><br><br></div></div>

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
												"Nature has made man happy and good, but society deprives him and makes him miserable." - Jean-Jacques Rousseau
											</span>
											<br>
											<br>
											<p>All rights reserved to SDPN</p>
											<a href="../i-index.html"><img src="..\imagens/bandeira_usa.png"></a>
											<a href="../index.html"><img src="..\imagens/bandeira_br.png"></a>
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



						';
						exit;
					} 
			}
	mysqli_close($conexao);
?>


	<script type="text/javascript" src="bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap\bootstrap.bundle.min.js"></script>

</body>
</html>