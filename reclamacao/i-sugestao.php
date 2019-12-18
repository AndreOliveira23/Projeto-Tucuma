<!DOCTYPE html>
<html>
<head>
	<title>Message - Tucumã</title>
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
	<img src="../imagens/transicao2.png" alt="transição" class="um transicao margem2" id="vsTransicao">

	<div class="formularios">
		<div class="container">
			<div class="row text-center mt-5">
				<div class="col-12">
					<h1>Contact - Tucumã</h1>
					<hr>
				</div>
			</div>
		</div>
	<div class="container text-center mb-5">
<?php
		include_once('i-conexao.php');
			//pega as informações do arquivo conexao.php e une com este
			$nome= $_POST['nome'];
			$cidade = $_POST['cidade'];
			$sugestao = $_POST['sugestao'];
			$id = uniqid();

			if(empty($nome)){//Se o campo nome estiver vazio, ele será preenchido como indicado na próxima linha
				$nome = 'Anônimo';
			}
			if(empty($cidade)){//Mesma coisa da linha 15
				$cidade = 'Não identificada';
			}
			 //inserir dados no banco
			$insert = "Insert into sugestoes (ID_SUGESTAO, NOME, CIDADE, SUGESTAO)
						values ('$id', '$nome', '$cidade' , '$sugestao')";
			 //verifica a conexao e o insert
			$resultado = @mysqli_query($conexao, $insert);
			if (!$resultado){
				die ('Invalid query: ' . mysqli_error($conexao));
			}else{
				echo "Suggestion sent successfully. Thank you for collaborating with the Tucumã Project!";
			}
		mysqli_close($conexao);//Fecha a conexão
?>
	<br><br>
	<input type='button' onclick="window.location='../i-index.html';" value="Back" id="botaoForm">
	</div>
</div>

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
					<a href="i-index.html"><img src="../imagens/bandeira_usa.png"></a>
					<a href="index.html"><img src="../imagens/bandeira_br.png"></a>
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