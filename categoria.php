<?php 
	//	session_start();
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
	
	$list = $conn->prepare("select * from estoque where valor != 'todos'");
	$list->execute();
	
	if(isset($_POST["submit"]))
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$i = 0;
		while(($file_data = fgetcsv($handle, 1000, ";")) !== false)
		{	
		/* $id = $file_data[0]; */
		$certificado = $file_data[1];
		$ticket = $file_data[2];
		$valor = $file_data[3];
		
		$insert = $conn->prepare("INSERT IGNORE INTO estoque (certificado,ticket, valor) VALUES ('".$certificado."','".$ticket."','".$valor."')");
		$insert->execute();
		$i = $i + 1;
		}
	}
?>

	
	<h1>Carregar Novos Tickets</h1>
	
	<form action="" method="POST" enctype="multipart/form-data">
	        <label for="import_tickets" class="control-label">Importar Tickets: </label>
	        <input type="file" name="file"  class="form-control" >
	        <br>
	        <button type="submit" class="btn btn-danger" name="submit" >Carregar</button>
	</form>
	<br>
	<h1>Relação de Tickets do sistema</h1>
	<div class="table-all">
	<table id="int" class="table table-striped">
	    <thead class="success">
	    	<th>Modelo</th>
	        <th>Ticket</th>
	        <th>Valor</th>
	       <!-- <th>Excluir</th>  -->
	    </thead>
	    <tbody>
	    <?php 
	    foreach ($list as $index => $reg): 
	    ?>
	    <tr>
	        <td><?php echo $reg["certificado"];?></td>
	        <td><?php echo $reg["ticket"];?></td>
	        <td><?php echo $reg["valor"];?></td>
	      <!--  <td><a href="./deleta.php?table=categorias&&descricao=<?php echo $reg['descricao']; ?>" id="deleta"><span class="glyphicon glyphicon-remove"></span></p> </a></td> 	-->
	    </tr>
	    <?php endforeach; ?>	
	    </tbody>
	</table>
	</div>
