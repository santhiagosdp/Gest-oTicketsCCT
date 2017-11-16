<?php 
	session_start();
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "sdp";
	
	//Criar a conexao
	$con = mysqli_connect($servidor, $usuario, $senha, $dbname);

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

$sql = mysqli_query($con,"INSERT IGNORE INTO estoque (certificado,ticket, valor) VALUES ('".$certificado."','".$ticket."','".$valor."')");
$i = $i + 1;
}

//echo $sql;
if($sql)
{
echo "You database has imported successfully. You have inserted records";
}
else
{
echo "Sorry!";
}

}
echo "./altera.php?table=contas"
 
?>
<html>
<head>
<title>IMPORT</title>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
Upload Excel File : <input type="file" name="file" /><br />
<input type="submit" name="submit" value="Upload" />
</form>	
</body>
</html>