<!DOCTYPE html>
<html>
<head>
	<title>Reclamações - Tucumã</title>
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
			
			<a class="navbar-brand" href="index.html"><img src="..\imagens\logo.png" alt="logo"></a>

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
						<div class="col-3 linha" id="ativo">
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
						<div class="col-3">
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
			<div class="row text-center mt-5 mb-5">
				<div class="col-12">
					<h1>Portal de Reclamações Tucumã</h1>
				</div>
			</div>
		</div>

	<div class="container text-center">

<?php
	include_once('conexao.php');//Conecta este arquivo ao banco de dados através do arquivo 'conexao.php'
		//Recebimento de dados do formulário de reclamação via método POST;
		$orgao = $_POST['orgao'];
		$reclamacao = $_POST['reclamacao'];
		$cidade = $_POST['cidade'];
		$bairro = $_POST['bairro'];
		$local = $_POST['local'];
		$envolvido = $_POST['envolvido'];
		$pergunta = $_POST['pergunta'];
		$resposta = $_POST['resposta'];
		$arquivo = $_FILES['arquivo'];
		$id = uniqid();//Gera um id único com a função uniqid
		$size = filesize($_FILES['arquivo']['tmp_name']);//Recebe o tamanho do arquivo na pasta temporária do banco de dados
		
		if((empty($orgao)) || (empty($pergunta))){ //Verifica se os campos "Órgão de destino" e "Pergunta de segurança" estão preechidos, caso não, retorna um alerta pedindo para o usuário preencher
			echo "<script type=\"text/javascript\">window.location='../reclamacao/menu.html';alert('Por favor, informe o Órgão de Destino e a Pergunta de Segurança!!!')</script>";
		}
		
		if(empty($envolvido)){//Verifica se o campo "Envolvido" foi preenchido, Caso não, o campo será registrado como o indicado na linha seguinte
			$envolvido = "Pessoa envolvida não é figura pública";
		}
			if ((!isset($_FILES['arquivo'])) || (empty($_FILES['arquivo'])) || (is_null($_FILES['arquivo'])) || ((!file_exists($_FILES['arquivo']['tmp_name'])))) { // Verifica se não tem anexo
			//Criando linha para inserir os dados no banco de dados através de comando SQL.
			$insert = "Insert into reclamacoes (ID, DESTINO, RECLAMACAO, CIDADE, BAIRRO, LOCALIDADE, PESSOA_ENVOLVIDA, PERGUNTA_SEGURANCA, RESPOSTA_SEGURANCA)
					   values('$id', '$orgao', '$reclamacao', '$cidade', '$bairro', '$local', '$envolvido', '$pergunta', '$resposta')";
			//Fazendo uma consulta entre a conexao e o insert para ver se não tem nenhum erro		   
			$resultado = @mysqli_query($conexao,$insert);
					if(!$resultado){//Se tiver erro, exibe o erro (Para mostrar o erro específico, é só tirar o '@'
						die(' Query Inválida: '.@mysqli_error($conexao));
					} else {//Se der tudo certo, registra tudo no banco
						echo "Reclamação registrada com sucesso! o código da sua reclamação é : ".$id."<br><br>";
						echo "<u><b>Guarde seu ID</b></u>, ele será útil caso precise de outros recusos da plataforma!<br><br>";
					}
			}else{	// Se existir Anexo
				
					$size = filesize($_FILES['arquivo']['tmp_name']);//Recebe o nome temporário do arquivos
					$extensoes_permitidas = array('.jpg', '.gif', '.png');//Cria um vetor para armazenar as extensões permitidas
					$extensao = strrchr($_FILES['arquivo']['name'], '.');//Separa o nome do arquivo e recebe somente a extensão
					
						if(($_FILES['arquivo']['size'] > $size) || ($_FILES['arquivo']['size'] < $size) || (in_array($extensao, $extensoes_permitidas) === true)){ //Verifica se o tamanho do anexo é menor que 2mb ou se o anexo possui as extensões permitidas
							//Repete o processo de insert
							$insert = "Insert into reclamacoes (ID, DESTINO, RECLAMACAO, CIDADE, BAIRRO, LOCALIDADE, PESSOA_ENVOLVIDA, PERGUNTA_SEGURANCA, RESPOSTA_SEGURANCA)
									   values('$id', '$orgao', '$reclamacao', '$cidade', '$bairro', '$local', '$envolvido', '$pergunta', '$resposta')";
							//Repete o processo de  consulta	   
							$resultado = @mysqli_query($conexao,$insert);
								if(!$resultado){
									die(' Query Inválida: '.@mysqli_error($conexao));
								} else {
									echo "Reclamação registrada com sucesso!!!! o código da sua reclamação é : ".$id."<br><br>";
									echo "<u><b>Guarde seu ID</b></u>, ele será útil em outros recusos da plataforma!"."<br><br>";
								}
							
							$dir = './arquivos/'; // Diretório que vai receber o arquivo.
							$tmpName = $_FILES['arquivo']['tmp_name']; // Recebe o nome temporário do arquivo.
							$name = $id; // Define o nome do arquivo como o ID da denúncia
							$nome = $_FILES['arquivo']['name'];
									
								if( move_uploaded_file( $tmpName, $dir . $name  ) ) { // move_uploaded_file irá realizar o envio do arquivo.		
									echo ""; // Em caso de sucesso, retorna vazio (para não atrapalhar o design.			
								} else {
									echo "Erro no envio do anexo"; //Em caso de erro, mostra mensagem de erro
								}
							}else{
								echo "<script type=\"text/javascript\">window.location='../reclamacao/menu.html';alert('Por favor, envie arquivos de até 2MB e com as seguintes extensões:. JPG, .GIF ou .PNG!')</script>";//Alerta JavaCript pra caso o arquivo seja maior que 2MB ou fora das extensões permitidas
							}
			}
	mysqli_close($conexao);	
?>
<input type='button' onclick="window.location='../index.html';" value="Voltar a página inicial" id="botaoForm" class="mb-5">
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

	<script type="text/javascript" src="..\bootstrap\jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="..\bootstrap\bootstrap.bundle.min.js"></script>
</body>
</html>

		
