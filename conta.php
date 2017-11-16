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
	
	$list = $conn->prepare("select * from vendidos where agente_registro = '{$_SESSION['usuario']}'");
	$list->execute();


?>
	<div class="container-fluid">
	
	<h1>Tickets Vendidos</h1>
	
		<br>
		<div class="table-all">
		<table id="int" class="table table-striped table-hover">
			<thead class="success">
				<th>Ticket</th>
				<th>Modelo</th>
				<th>valor Pago</th>
				<th>Modelo Pagamento</th>
				<th>Num Boleto</th>
				<th>Cliente</th>
				<th>Contador</th>
				<th>Ações</th>
			</thead>
			<tbody>
			<?php 
			foreach ($list as $index => $reg):
				if (($reg['id'] % 2) == 0 ) {
					$opt = 'warning';
				}
				else {
					$opt = 'success';
				}
			?>
			<tr class="<?=$opt?>">
				<td><?php echo $reg["ticket"];?></td>
				<td><?php echo $reg["certificado"];?></td>
					<td><?php echo $reg["valor_pago"];?></td>
					<td><?php echo $reg["modelo_pagto"];?></td>
					<td><?php echo $reg["num_boleto"];?></td>
					<td><?php echo $reg["cliente"];?></td>
					<td><?php echo $reg["contador"];?></td>
				<td><a href=
						<?php echo
						 "./altera.php?table=contas". 
						str_replace(" ", "_", "&&id={$reg['id']}");/*.
						str_replace(" ", "_", "&&descricao={$reg['descricao']}").
						str_replace(" ", "_", "&&saldoinicial={$reg['saldoinicial']}").
						str_replace(" ", "_", "&&saldoatual={$reg['saldoatual']}").
						str_replace(" ", "_", "&&tipo={$reg['tipo']}").
						str_replace(" ", "_", "&&observacoes={$reg['observacoes']}");*/
						?> id="altera" name="altera"><span class="glyphicon glyphicon-refresh"></span></p> </a></td>
				</tr>
			<?php endforeach; ?>	
			</tbody>
		</table>
		</div>
		<br><br>
	</div>
