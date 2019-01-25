<!DOCTYPE html>
<html>
<head>
	<title></title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    	<meta charset="utf-8">
		
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="javascriptpersonalizado.js"></script>
<table class="table table-striped table-bordered table-condensed table-hover">
<thead class="thead">


</head>
<body>
<?php include('cabecalho.php');?>

<div class="jumbotron text-center"><h1 class="alert-danger">Consultar eleitores</h1></div>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
function myFunction(elmnt, clr) {
    elmnt.style.color = clr;
}
</script>
<table class="table table-striped table-bordered table-condensed table-hover">

<h2 class="alert-dismissable"  onmousedown="myFunction(this,'red')" onmouseup="myFunction(this,'green')" >Filtro de pesquisa</h2>
<form method="POST" id="form-pesquisa" class="form-control-static" action="resultado_pesq.php">
			Pesquisar: <input type="text" name="palavra" id="pesquisa" placeholder="Digite o nome do eleitor " width="700px">
			<input type="submit" name="enviar" value="Pesquisar">
		</form>
		
<thead class="thead">
	<tr>
		<th>Nome</th>
		<th>Título de Eleitor</th>
		
	</tr>
</thead>

<?php

$con=mysqli_connect('localhost','root','','votacao') or die(mysqli_error()); 
	

   $consulta = mysqli_query($con,'select * from eleitor');

		while ($dados = mysqli_fetch_array($consulta)){
			?>
			<tr><td class="btn-link"><?php
			echo utf8_encode($dados['nome'])
			;?></td>
<td class="btn-danger"><?php
			echo $dados['numero']
			;?></td>


			<?php
		}
mysqli_close($con);

?></table>

</form>
<?php include('rodape.php');?>
</body>
</html>