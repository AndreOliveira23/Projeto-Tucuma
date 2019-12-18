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
	<div class="container text-center">

<?php
		session_start();

		echo "<b>Hello,".$_SESSION['nome']."!";
		$_SESSION['certo'];
		$_SESSION['errado'];
		?>
<?php
$questao2=$_POST['2'];

	if($questao2=='2b'){
		$_SESSION['certo']=$_SESSION['certo']+1;
	}else{
		$_SESSION['errado']=$_SESSION['errado']+1;
	}
?>

	Which animal is this?<br><br>
	<form action="i-questao4.php" method="post">
	<audio controls
	<scource src = "papagaio.mp3" type = "audio">
	</audio><br>
	</div>
	</div>

	<div class="container som">
		<input type="radio" name="3" value="3a">
		A) Jatoba<br>
		<input type="radio" name="3" value="3b">
		B) Roses<br>
		<input type="radio" name="3" value="3c">
		C) Pig<br>
		<input type="radio" name="3" value="3d" required>
		D) Frog<br>
		<input type="radio" name="3" value="3e" required>
		E) Parrot<br>
		<div class="formularios">
			<input type="submit" value="Next" id="botaoForm" class="mt-4 mb-5">
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

	<script type="text/javascript" src="bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap\bootstrap.bundle.min.js"></script>
</body>
</html>