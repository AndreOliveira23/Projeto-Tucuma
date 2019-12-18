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
	<div class="container text-center">
<?php
		//inicia a sessão e armazena informações via post
		session_start();

		echo "<b>Olá, ".$_SESSION['nome']."!<b>";
		$_SESSION['certo'];
		$_SESSION['errado'];
		?>
<?php
$questao3=$_POST['3'];
	//verifica se a resposta está correta ou incorreta
	if($questao3=='3e'){
		$_SESSION['certo']=$_SESSION['certo']+1;
	}else{
		$_SESSION['errado']=$_SESSION['errado']+1;
	}
?>
	Que animal é esse?<br><br>
	<form action="questao5.php" method="post">
	<audio controls
	<scource src = "macaco.mp3" type = "audio">
	</audio>
	</div>
	</div>

	<div class="container som">
		<input type="radio" name="4" value="4a">
		A)Morcego<br>
		<input type="radio" name="4" value="4b">
		B)Mosca<br>
		<input type="radio" name="4" value="4c">
		C)Minhoca<br>
		<input type="radio" name="4" value="4d" required>
		D)Macaco<br>
		<input type="radio" name="4" value="4e" required>
		E)Manjuba<br>
		<div class="formularios">
			<input type="submit" value="Próximo" id="botaoForm" class="mt-4 mb-5">
		</div>
	</div>

	</form>

	<!--transição-->
	<img src="..\imagens\transicao3.png" class="img-fluid um margem" id="vsTransicao">


	<!--rodapé-->
	<div class="rodape" style="font-weight: normal;">
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

	<script type="text/javascript" src="bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap\bootstrap.bundle.min.js"></script>
</body>
</html>
