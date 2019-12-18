<!DOCTYPE html>
<html>
<head>
	<title>Guess the sound - Tucumã</title>
	<link rel="icon" type="imagem/png" href="../imagens/meufavicon.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="..\index12.css">
	<link rel="stylesheet" type="text/css" href="..\bootstrap\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="..\bootstrap\all.min.css">
	<link rel="stylesheet" type="text/css" href="..\bootstrap\fontawesome\css\all.css">
	<meta http-equiv="refresh" content="5; http://localhost/tucuma/som/i-ranking.php">
</head>
<body onload="start();">

	<!--navbar-->
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			
			<a class="navbar-brand" href="..\i-index.html"><img src="..\imagens\logo.png" alt="logo"></a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSite">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item mr-5">
						<a class="nav-link" href="../reclamacao/i-menu.html">Complain</a>
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
					<h1>Guess the sound!</h1>
					<hr>
				</div>
			</div>
		</div>
	<div class="container">
<?php
	session_start();
	
	include_once('i-conexao.php'); 
	
		echo "Hello,".$_SESSION['nome'].", This was your result: <br><br>";
		
			$_SESSION['certo'];
			$_SESSION['errado'];
			$_SESSION['ID'];
			

			$questao5=$_POST['5'];
	
				if($questao5=='5b'){
					$_SESSION['certo']= $_SESSION['certo']+1;
				}else{
					$_SESSION['errado']= $_SESSION['errado']+1;
				}

		echo "You answered right ".$_SESSION['certo']." questions <br><br>";
		echo "And missed ".$_SESSION['errado']." questions<br><br>";
		
		$certas = $_SESSION['certo'];
		$nome = $_SESSION['nome'];
		$id = $_SESSION['ID'];
		   
			$update = "Update JOGADORES set RECORDE_JOGADOR = '$certas' where ID_JOGADOR = '$id'";
					   
			$resultado = @mysqli_query($conexao,$update);
					if(!$resultado){
						die(' Invalid query: '.mysqli_error($conexao));
					} else {
						echo "Score successfully recorded!!!!<br><br>";
					}
			
	mysqli_close($conexao);
?>			
			<b><label>You will be redirected to the Ranking at <span id="tempo"></span></label></b>
			<input type='button' onclick="window.location='../i-index.html';" value="Back" id="botaoForm" class="mb-5">
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
					<form action="../reclamacao/i-sugestao.php" method="POST">
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