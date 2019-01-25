<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Una Digital</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Votação</h1>
			</div>
			<form class="form-horizontal" method="POST" action="cadastrar.php">	

<div id="cab"><h1>Consultar eleitores</h1></div>
<?php
@$con=mysqli_connect('localhost','root','','Votacao');

	//$seleciona = mysqli_query($con,"select id,nome from alunos");
?>
<div class="form-group">
<label class="radio-inline"> Título:
<input type="text" name="numero" >
</label>
<br></div>
	
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Escolha seu Candidato</label>
					<?php $seleciona= mysqli_query($con,"select * from candidato GROUP BY AFTER");
					while ($consulta2 = mysqli_fetch_assoc($seleciona)){
	?>
					<label class="radio-inline"> 
						<input type="radio" name="situacao" value="<?php echo $consulta2["nome"]." - ".$consulta2['partido']; ?>"><span class="label label-success"><?php echo $consulta2["nome"]." - ".$consulta2['partido'];?></span> 
					</label> 
						<?php } ?>
					
					
			</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-danger">Cadastrar</button>
					</div>
				</div>
			</form>
		</div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>