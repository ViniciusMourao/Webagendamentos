<?php
require_once("controle/ControleCadastro.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
		<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<link rel="stylesheet" href="css/estilo.css">
		<script src="js/editar.js"></script>
		
        <title>Editar</title> 
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
								<a class="nav-link" href="index.php">Cadastrar<span class="sr-only"></span></a>
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
				<h5>Editar - Agendamento de Potenciais Clientes</h5><br>
				<p>Sistema utilizado para agendamento de serviços</p>
				<p>
				<?php
					$controller = new CadastroController();
					$resultado = $controller->listar($_GET['ID_Agendamento']);
					//print_r($resultado);
				?>
				<form method="post" action="controle/ControleCadastro.php?funcao=editar&id=<?php echo $resultado[0]['ID_Agendamento']; ?>" id="form" name="form">
				Nome:<br>
				<input name="txtNome" id="txtNome" type="text" size="100" required id="txtNome" value="<?php echo $resultado[0]['Nome']; ?>">
				<br><br>
				Telefone:<br>
				<input required name="txtTelefone" id="txtTelefone" placeholder="(xx)xxxxx-xxxx" value="<?php echo $resultado[0]['Telefone']; ?>">
				<br><br>
				Origem:<br>
				<select required name="txtOrigem" id="txtOrigem">
					<option <?php if($resultado[0]['Origem'] == "Celular"){ echo "selected"; } ?>>Celular</option>
					<option <?php if($resultado[0]['Origem'] == "Fixo"){ echo "selected"; } ?>>Fixo</option>
					<option <?php if($resultado[0]['Origem'] == "Whatsapp"){ echo "selected"; } ?>>Whatsapp</option>
					<option <?php if($resultado[0]['Origem'] == "Facebook"){ echo "selected"; } ?>>Facebook</option>
					<option <?php if($resultado[0]['Origem'] == "Instagram"){ echo "selected"; } ?>>Instagram</option>
					<option <?php if($resultado[0]['Origem'] == "Google Meu Negocio"){ echo "selected"; } ?>>Google Meu Negocio</option>
				</select>
				<br><br>
				Data do Contato:<br>
				<input required name="txtDataContato" type="date" id="txtDataContato" value="<?php echo $resultado[0]['Data_Contato']; ?>">
				<br><br>
				Observação:<br>
				<textarea width="100" name="txtObservacao" id="txtObservacao" rows="3"><?php echo $resultado[0]['Observacao']; ?></textarea>
				<br><br>
				<button type="submit" id="btnInserir" class="btn btn-primary">Editar</button>
				</form>
			</div>
			<br><br><br>
        </div>
    </body>
</html>