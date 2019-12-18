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
						<div class="col-3 linha">
							<p></p>
							<a href='alterar.html'>Alterar dados da	reclamação</a>
							<p></p>
						</div>
						<div class="col-3" id="ativo">
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
	include_once('conexao.php');//Conecta este arquivo ao banco de dados.

		$codigo = $_POST ['codigo'];//Recebe o código via método POST
		
		//Verificando se o código existe no banco de dados
		$select = "select ID from reclamacoes where ID = '$codigo'"; 

			$resultado = @mysqli_query($conexao, $select);
			if(!$resultado){
				echo '<input type="button" onclick="window.location='."index.html'".';" value="Voltar" id="botaoForm"><br><br>';
				die('<b>Query Inválida:</b>'. @mysqli_error($conexao));
			} else {
				$num = @mysqli_num_rows($resultado);
				if ($num==0){
					echo "<b>Código </b>Não localizado!!!!<br><br>";
					echo '<input type="button" onclick="window.location='."'excluir.html'".';" value="Voltar" id="botaoForm"><br><br>
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
												"A natureza fez o homem feliz e bom, mas a sociedade deprava-o e torna-o miserável." - Jean-Jacques Rousseau
											</span>
											<br>
											<br>
											<p>Todos os direitos reservados SDPN</p>
											<a href="../i-index.html"><img src="../imagens/bandeira_usa.png"></a>
											<a href="../index.html"><img src="../imagens/bandeira_br.png"></a>
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
				die ('Query Inválida: ' . @mysqli_error ($conexao));
			} else {
				echo "Reclamação Excluída com Sucesso!";
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
		<a href="../index.html"><input type="button" onclick="window.location='."'../index.html'".';" value="Voltar" id="botaoForm" class="mb-5 mt-3"></a>
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
						"A natureza fez o homem feliz e bom, mas a sociedade deprava-o e torna-o miserável." - Jean-Jacques Rousseau
					</span>
					<br>
					<br>
					<p>Todos os direitos reservados SDPN</p>
					<a href="../i-index.html"><img src="../imagens/bandeira_usa.png"></a>
					<a href="../index.html"><img src="../imagens/bandeira_br.png"></a>
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