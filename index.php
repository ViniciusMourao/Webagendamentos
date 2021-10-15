<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
		<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<!--<link rel="stylesheet" href="css/index.css">-->
		
        <title>Sistema de Gerenciamento - Clientes</title> 
	</head> 
	
	<body>
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12">
					<a class="navbar-brand" href="#">SISTEMA WEB</a>
					<button class="navbar navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>	
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
							<li class="nav-item=">
								<a class="nav-link" href="#">Cadastrar<span class="sr-only"></span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="consultarClientes.php">Consulta</a>
							</li>
						</ul>
					</div>
				</nav>  
			</div>
				<br>
				<div id="forms">
				<h5>Cadastrar - Agendamento de Potenciais Clientes</h5><br>
				<p>Sistema utilizado para agendamento de serviços</p>
				<form method="POST" action="controle/ControleCadastro.php?funcao=cadastro" id="form" name="form">
				Nome:<br>
				<input name="txtNome" id="txtNome" type="text" size="100">
				<br><br>
				Telefone:<br>
				<input name="txtTelefone" id="txtTelefone" type="tel" size="100" placeholder="(xx)xxxxx-xxxx">
				<br><br>
				Origem:<br>
				<select name="txtOrigem" id="txtOrigem">
					<option>Celular
					<option>Fixo
					<option>Whatsapp
					<option>Facebook
					<option>Instagram
					<option>Google Meu Negócio
				</select> 
				<br><br>
				Data do Contato:<br>
				<input name="txtDataContato" id="txtDataContato" type="date">
				<br><br>
				Observação:<br>
				<textarea width="100" name="txtObservacao" id="txtObservacao" rows="3"></textarea>
				<br><br>
				<button type="submit" id="btnInserir" class="btn btn-primary">Cadastrar</button>
				</form>
			</div>
			<br><br><br>
        </div>
    </body>
</html>