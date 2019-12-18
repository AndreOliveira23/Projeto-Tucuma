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
						<div class="col-3 linha">
							<p></p>
							<a href='i-consulta.html'>See Complaint</a>
							<p></p>
						</div>
						<div class="col-3 linha">
							<p></p>
							<a href='i-alterar.html'>Change complaint data</a>
							<p></p>
						</div>
						<div class="col-3" id="ativo">
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

		$codigo = $_POST ['codigo'];
		
		//Verificando se o código existe no banco de dados
		$select = "select ID from reclamacoes where ID = '$codigo'"; 

			$resultado = @mysqli_query($conexao, $select);
			if(!$resultado){
				echo '<input type="button" onclick="window.location='."i-index.html'".';" value="Back"><br><br>';
				die('<b>Invalid query:</b>'. @mysqli_error($conexao));
			} else {
				$num = @mysqli_num_rows($resultado);
				if ($num==0){
					echo "<b>Code </b>not located!!!!<br><br>";
					echo '<input type="button" onclick="window.location='."'../reclamacao/i-excluir.html'".';" value="Back" id="botaoForm"><br><br>
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

					';
					exit;
				} 
			} 
		//Se o código existe, deleta os dados do banco
		$delete = "delete from reclamacoes where ID like '$codigo'";
			
		$resultado = @mysqli_query($conexao, $delete);
			if (!$resultado){  
				die ('Invalid query: ' . @mysqli_error ($conexao));
			} else {
				echo "Complaint successfully deleted!";
			}
		
		$diretorio = "./arquivos/";
		$arquivo = $codigo;
		$nomeCompleto = $diretorio.$arquivo;
		if ((!isset($nomeCompleto)) || (empty($nomeCompleto)) || (is_null($nomeCompleto)) || ((!file_exists($nomeCompleto)))){//Se existir anexo, exclui o anexo
		echo "";
		}else{
		//unlink($nomeCompleto);
			unlink("./arquivos/".$codigo);
		}
	mysqli_close($conexao);

?>
		<a href="../i-index.html"><input type="button" onclick="window.location='."'../i-index.html'".';" value="Back" id="botaoForm" class="mb-5 mt-3"></a>
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
					<p>All rights reserved tp SDPN</p>
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

	<script type="text/javascript" src="bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap\bootstrap.bundle.min.js"></script>

</body>
</html>
</body>
</html>	