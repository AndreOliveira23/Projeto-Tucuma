<!DOCTYPE html>
<html>
<head>
	<title>Quizz - Tucumã</title>
	<link rel="icon" type="imagem/png" href="../imagens/meufavicon.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="..\index12.css">
	<link rel="stylesheet" type="text/css" href="..\bootstrap\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="..\bootstrap\all.min.css">
	<link rel="stylesheet" type="text/css" href="..\bootstrap\fontawesome\css\all.css">
	<meta http-equiv="refresh" content="5; http://localhost/tucuma/quizz/ranking.php">
</head>
<body onload="start();">

	<!--navbar-->
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			
			<a class="navbar-brand" href="..\index.html"><img src="..\imagens\logo.png" alt="logo"></a>

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
					<h1>Quizz!</h1>
					<hr>
				</div>
			</div>
		</div>
	<div class="container">
<?php
	session_start();
	//inicia a conexão com o banco de dados
	include_once('conexao.php'); 
	
		echo "Olá,".$_SESSION['nome'].", Este foi seu resultado: <br><br>";
		
			$_SESSION['certo'];
			$_SESSION['errado'];
			$_SESSION['ID'];
			
			//verifica se a questão está correta ou incorreta
			$questao10=$_POST['10'];
	
				if($questao10!='10a'){
					$_SESSION['errado']= $_SESSION['errado']+1;
				}else{
					$_SESSION['certo']= $_SESSION['certo']+1;
				}
				

		echo "Você acertou ".$_SESSION['certo']." questões <br><br>";
		echo "E errou ".$_SESSION['errado']." questões<br><br>";
		
		$certas = $_SESSION['certo'];
		$nome = $_SESSION['nome'];
		$id = $_SESSION['ID'];
		   //modifica e armazena novas informações no banco de dados
			$update = "Update JOGADORES set RECORDE_JOGADOR = '$certas' where ID_JOGADOR = '$id'";
					   
			$resultado = @mysqli_query($conexao,$update);
					if(!$resultado){
						die(' Query Inválida: '.mysqli_error($conexao));
					} else {
						echo "Pontuação registrada com sucesso!!!! <br><br>";
					}
			//destroi a sessão criada		
			session_destroy();
	//encerra a conexão com o banco		
	mysqli_close($conexao);
?>
			<b><label>Você será redirecionado para o Ranking em <span id="tempo"></span></label></b>
			<input type='button' onclick="window.location='../index.html';" value="Voltar" id="botaoForm" class="mb-5">
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

	<script type="text/javascript">
		var count=new Number();
		var count=5;

		function start(){
			if ((count - 1) >= 0) {
				count=count - 1;
				tempo.innerText=count;
				setTimeout('start();',1000);
			}
		}

	</script>
	<script type="text/javascript" src="..\bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="..\bootstrap\bootstrap.bundle.min.js"></script>
</body>
</html>