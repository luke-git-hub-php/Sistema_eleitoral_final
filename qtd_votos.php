<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include('cabecalho.php');?>
<?php $con=mysqli_connect('localhost','root','','votacao');
$qtd=mysqli_query($con, "SELECT COUNT(voto) FROM votacao WHERE voto='Marcos Oliveira'");


$a=mysqli_query($con , "select voto from votacao where voto='Maria Almeida' ");
$b=mysqli_query($con , "select voto from votacao where voto='Marcos Oliveira'");

echo "Votos de Maria Almeida: ". $total=mysqli_num_rows($a)."<br>";


echo "Votos de Marcos Oliveira: ". $total2=mysqli_num_rows($b);


?>
<?php include('rodape.php');?>
</body>
</html>




