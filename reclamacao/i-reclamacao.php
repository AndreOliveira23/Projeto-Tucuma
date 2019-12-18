<!DOCTYPE html>
<html>
<head>
	<title>Complaints - Tucumã</title>
	<link rel="icon" type="imagem/png" href="imagens/meufavicon.png">
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
			
			<a class="navbar-brand" href="i-index.html"><img src="..\imagens\logo.png" alt="logo"></a>

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
						<div class="col-3 linha" id="ativo">
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
						<div class="col-3">
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
			<div class="row text-center mt-5 mb-5">
				<div class="col-12">
					<h1>Tucumã Complaints Portal</h1>
				</div>
			</div>
		</div>

	<div class="container text-center">

<?php
	include_once('i-conexao.php');
	
		$orgao = $_POST['orgao'];
		$reclamacao = $_POST['reclamacao'];
		$cidade = $_POST['cidade'];
		$bairro = $_POST['bairro'];
		$local = $_POST['local'];
		$envolvido = $_POST['envolvido'];
		$pergunta = $_POST['pergunta'];
		$resposta = $_POST['resposta'];
		$arquivo = $_FILES['arquivo'];
		$id = uniqid();
		$size = filesize($_FILES['arquivo']['tmp_name']);
		
		if((empty($orgao)) || (empty($pergunta))){ //Verifica se os campos "Órgão de destino" e "Pergunta de segurança" estão preechidos, caso não, retorna um alerta pedindo para o usuário preencher
			echo "<script type=\"text/javascript\">window.location='../reclamacao/i-menu.html';alert('Please, write the Destine Organ and the Security Question!!!')</script>";
		}
		
		if(empty($envolvido)){//Verifica se o campo "Envolvido" foi preenchido, Caso não, o campo será registrado como o indicado na linha seguinte
			$envolvido = "Person involved is not a public figure";
		}
			if ((!isset($_FILES['arquivo'])) || (empty($_FILES['arquivo'])) || (is_null($_FILES['arquivo'])) || ((!file_exists($_FILES['arquivo']['tmp_name'])))) { // Verifica se não tem anexo
			
			$insert = "Insert into reclamacoes (ID, DESTINO, RECLAMACAO, CIDADE, BAIRRO, LOCALIDADE, PESSOA_ENVOLVIDA, PERGUNTA_SEGURANCA, RESPOSTA_SEGURANCA)
					   values('$id', '$orgao', '$reclamacao', '$cidade', '$bairro', '$local', '$envolvido', '$pergunta', '$resposta')";
					   
			$resultado = @mysqli_query($conexao,$insert);
					if(!$resultado){
						die(' Invalid query	: '.@mysqli_error($conexao));
					} else {
						echo "Complaint successfully registered! the code of your report is : ".$id."<br><br>";
						echo "<u><b>Keep your Code</b></u>, it will be useful if you need other platform refusals!<br><br>";
					}
			}else{	// Se existir Anexo
				
					$size = filesize($_FILES['arquivo']['tmp_name']);
					$extensoes_permitidas = array('.jpg', '.gif', '.png');
					$extensao = strrchr($_FILES['arquivo']['name'], '.');
					
						if(($_FILES['arquivo']['size'] > $size) || ($_FILES['arquivo']['size'] < $size) || (in_array($extensao, $extensoes_permitidas) === true)){ //Verifica se o tamanho do anexo é menor que 2mb ou se o anexo possui as extensões permitidas
						
							$insert = "Insert into reclamacoes (ID, DESTINO, RECLAMACAO, CIDADE, BAIRRO, LOCALIDADE, PESSOA_ENVOLVIDA, PERGUNTA_SEGURANCA, RESPOSTA_SEGURANCA)
									   values('$id', '$orgao', '$reclamacao', '$cidade', '$bairro', '$local', '$envolvido', '$pergunta', '$resposta')";
								   
							$resultado = @mysqli_query($conexao,$insert);
								if(!$resultado){
									die(' Invalid query: '.@mysqli_error($conexao));
								} else {
									echo "Complaint successfully registered !!!! the code of your report is : ".$id."<br><br>";
									echo "Keep your code, it will be useful in other platform refusals!"."<br><br>";
								}
							
							$dir = './arquivos/'; // Diretório que vai receber o arquivo.
							$tmpName = $_FILES['arquivo']['tmp_name']; // Recebe o nome temporário do arquivo.
							$name = $id; // Define o nome do arquivo como o ID da denúncia
							$nome = $_FILES['arquivo']['name'];
									
								if( move_uploaded_file( $tmpName, $dir . $name  ) ) { // move_uploaded_file irá realizar o envio do arquivo.		
									echo ""; // Em caso de sucesso, retorna sucesso.			
								} else {
									echo "<script>window.location='i-menu.html';alert('Erro no envio do anexo')</script>"; // 
								}
							}else{
								echo "<script type=\"text/javascript\">window.location='i-Denuncia.html';alert('Please upload files up to 2MB and with the following extensions.:. JPG, .GIF or .PNG!')</script>";
							}
			}
	mysqli_close($conexao);	
?>
<input type='button' onclick="window.location='../i-index.html';" value="Return to home page" id="botaoForm" class="mb-5">
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

	<script type="text/javascript" src="..\bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="..\bootstrap\bootstrap.bundle.min.js"></script>
</body>
</html>

		
