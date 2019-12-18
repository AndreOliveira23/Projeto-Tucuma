<!DOCTYPE html>
<html>
<head>
	<title>Adivinhe o Som - Tucumã</title>
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
						<a class="nav-link" href="../reclamacao/menu.html">Reclame</a>
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
	<img src="../imagens/transicao2.png" alt="transição" class="um transicao margem2" id="vsTransicao">

	<div class="formularios">
		<div class="container">
			<div class="row text-center mt-5">
				<div class="col-12">
					<h1>Adivinhe o Som!</h1>
					<hr>
				</div>
			</div>
		</div>
	<div class="container text-center ranking mb-5">

<?php
//inicia a conexão com o banco de dados
	include_once('conexao.php');
		
		$nome=$_POST['nome'];
		$certo=0;
		$errado=0;
		$id = uniqid();
				//inicia a conexão com o banco de dados
				session_start();
				$_SESSION['nome']=$nome;
				$_SESSION['certo']= $certo;
				$_SESSION['errado']= $errado;
				$_SESSION['ID']= $id;
			//insere novos valores no banco de dados
			$insert = "Insert into JOGADORES (ID_JOGADOR, ID_JOGO, RECORDE_JOGADOR, NOME_JOGADOR)
					   values('$id', '1', '0', '$nome')";
					   
			$resultado = @mysqli_query($conexao,$insert);
					if(!$resultado){
						die('Query Inválida: '.@mysqli_error($conexao));
					} else {
						echo "<b>Bem vindo(a), ".$_SESSION['nome']."</b><br><br>";
						echo "<a href=questao1.php><input type='button' id='botaoForm' value='Iniciar o Quizz'></a>";
					}
	//encerra a conexão com o banco de dados				
	mysqli_close($conexao);
?>
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
					<form action="../reclamacao/sugestao.php" method="POST">
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

	<script type="text/javascript" src="..\bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="..\bootstrap\bootstrap.bundle.min.js"></script>
</body>
</html>	
		