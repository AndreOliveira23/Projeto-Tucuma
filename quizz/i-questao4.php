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
					<h1>Quizz!</h1>
					<hr>
				</div>
			</div>
		</div>
	<div class="container text-center imagem mb-4">
<?php
		session_start();

		echo "<b>Hello,".$_SESSION['nome'].", This is the fourth question!</b>";
		$_SESSION['certo'];
		$_SESSION['errado'];
		?>
<?php
$questao3=$_POST['3'];
	if($questao3=='3e'){
		$_SESSION['certo']=$_SESSION['certo']+1;
	}else{
		$_SESSION['errado']=$_SESSION['errado']+1;
	}
?>			

	<form action="i-questao5.php" method="post">
	<br>Which alternative presents ways to save water?<br>
	</div>
	</div>

	<div class="container som">
		<input type="radio" name="4" value="4a" required>
		A)Brush your teeth with the tap on and take long showers <br>
		<input type="radio" name="4" value="4b">
		B)Wash the car with a hose and over discharge<br>
		<input type="radio" name="4" value="4c">
		C)Clean the sidewalk by flushing it and paying no attention to leaks<br>
		<input type="radio" name="4" value="4d">
		D)Keep faucet closed when not in use and Wash clothes when basket is full<br>
		<input type="radio" name="4" value="4e">
		E)None of the alternatives<br>
		<div class="formularios mt-5 mb-5">
			<input type="submit" value="Question 05" id="botaoForm"> </br>
		</div>
	</div>

	</form>

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

	<script type="text/javascript" src="..\bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="..\bootstrap\bootstrap.bundle.min.js"></script>
</body>
</html>