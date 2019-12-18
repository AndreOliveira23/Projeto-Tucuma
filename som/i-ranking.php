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
					<h1>Guess the sound - Ranking</h1>
					<hr>
				</div>
			</div>
		</div>
	<div class="container text-center ranking mb-5">
	<center>
<?php
	include_once('i-conexao.php');
?>
	<div class="row mb-3">
		<div class="col-3">
			
		</div>
		<div class="col-2">
			<label>Placing</label>
		</div>
		<div class="col-2">
			<label>Player's name</label>
		</div>
		<div class="col-2">
			<label>Punctuation</label>
		</div>
		<div class="col-3">
		
		</div>
	</div>
			<?php // TD = COLUNA TR = LINHA
				$posicao = 1;// acumulador de posicoes
				$select = "SELECT * FROM JOGADORES WHERE ID_JOGO = 1 ORDER BY RECORDE_JOGADOR Desc Limit 5";
				$resultado = mysqli_query($conexao,$select) 
						or die(mysql_error($conexao));
				//faz um looping e cria um array com os campos da consulta
				while($vetor = mysqli_fetch_object($resultado)){
				?>
			<div class="row mb-2">
				<div class="col-3">
				
				</div>
				<div class="col-2">
					<?php if($posicao==1){
						echo "<img src='../imagens/trofeu.png'>";
					}elseif($posicao==2){
						echo "<img src='../imagens/trofeu2.png'>";
					}elseif($posicao==3){
						echo "<img src='../imagens/trofeu3.png'>";
					}elseif($posicao==4){
						echo "<img src='../imagens/medalha1.png'>";
					}else{
						echo "<img src='../imagens/medalha2.png'>";
					}  ?>
				</div>
				<div class="col-2">
					<?php echo $vetor->NOME_JOGADOR; ?>
				</div>
				<div class="col-2">
					<?php echo $vetor->RECORDE_JOGADOR; ?>
				</div>
				<div class="col-3">
				
				</div>
			</div>
				
				<?php
				$posicao = $posicao + 1; // acumula proxima posicao ate terminar
				}
				?>
	</center>
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

	<script type="text/javascript" src="..\bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="..\bootstrap\bootstrap.bundle.min.js"></script>
</body>
</html>	
			
			
			
			