<?php 
	session_start();
	$server = $_SESSION["localhost"];
	$user = $_SESSION["server_user"];
	$pass = $_SESSION["server_pass"];
	$db = $_SESSION["server_db"];
	$conn = null;
	
	try {
		$conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	$list = $conn->prepare("select * from financeiro where usuario = '{$_SESSION['usuario']}'");
	$list->execute();


?>
	<div class="container-fluid">
	
		<h1>Financeiro</h1>
		
		<form id="form" role="form" action="./cadastra.php?table=financeiro" method="POST" class="form">
			<div class="form-group">
				<label for="categoria" class="control-label">Certificado: </label>
				<select class="form-control" name='categoria'>
					<?php 
					$categorias = $conn->prepare("select * from estoque");
					$categorias->execute();
					foreach ($categorias as $index => $reg):
					?>
					<option value="<?php echo $reg['certificado']?>"><?php echo $reg['certificado'].' Valor: R$ '.$reg['valor']?></option>
					<?php endforeach; ?>
				</select>
				<br>
				<label for="tipo" class="control-label">pagamento: </label>
					<select class="form-control" name='tipo'>
						<option value="débito" >débito</option>
						<option value="crédito">crédito</option>
						<option value="dinheiro" selected="selected">dinheiro</option>
						<option value="boletocct">boletocct</option>
						<option value="boletovalid">boletovalid</option>
					</select>
					<br>
					<?php  if( 'boletocct'=='boletocct'){      // comparar com o selecionado anterior           
					echo ('<input for="numboleto" class="form-control" placeholder="Digite numero do boleto.">');
					}
					?>
				<br>
				<label for="nomecliente" class="control-label">Nome do Cliente: </label>
				<input type="text" name="nomecliente" class="form-control" placeholder="digite nome do cliente">
				<br>
				<label for="contador" class="control-label">Contador: </label>
				<select class="form-control" name='contador'>
					<?php 
					$categorias = $conn->prepare("select * from contador");
					$categorias->execute();
					foreach ($categorias as $index => $reg):
					?> 
					<option value="<?php echo $reg['nome_contador']?>"><?php echo $reg['nome_contador']?></option> 
					<?php endforeach; ?>
				</select>
				<br>
				<label for="vlrbruto" class="control-label">Valor venda: </label>
				<input value="0.00" type="text" name="vlrbruto" class="form-control" placeholder="valor de venda">
				<br>
				<label for="observacoes" class="control-label">Observações: </label>
				<input type="text" name="observacoes" class="form-control" placeholder="Adicione detalhes sobre esta venda">
				<br>
				<button type="submit" class="btn btn-default">Salvar</button>
			</div>
		</form>
		<br>
	</div>
