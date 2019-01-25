<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Una Digital</title>
		<meta charset=utf-8>
	<title>Funções</title>
	<script type="text/javascript">
	function evento_entrar(){
		alert("Seja bem vindo a Urna Digital!!! Vote Consciênte!!!");
	}
	function evento_sair(){
		alert("Ate a sua proxima visita!!!");
	}
	function eventoclique(){
		document.getElementById("id2").style.color="red";
	}
	</script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="../jquery/jquery/jquery-1.12.3.min.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
         $('.dica + span')
         .css({display:'none',
               border: '1px solid #336600',
               padding:'2px 4px',
               background:'yellow',
               marginLeft:'10px'   });
         $('.dica').focus(function() {
           $(this).next().fadeIn(1500);       
         })
         .blur(function(){
          $(this).next().fadeOut(1500);
         });
       });
  </script>
  </script>
      
	</head>
	<body onload="evento_entrar()" onnuload="evento_sair()">
	<?php include('cabecalho.php');?>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<div class="jumbotron text-center"><h1 class="alert-dismissable">Votação</h1></div>
			</div>
			<form class="form-horizontal" method="POST" action="cadastrar_voto2.php">	


<?php
@$con=mysqli_connect('localhost','root','','votacao');

	//$seleciona = mysqli_query($con,"select id,nome from alunos");
?>
<div class="form-group">
<label class="radio-inline"> Título:
<input type="text" name="numero"  placeholder="título de eleitor" class="dica"   maxlength="14" ><span>Apenas números</span><br><br>
</label>
<br></div>
	
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Escolha seu Candidato</label>
					<?php $seleciona= mysqli_query($con,"select * from candidato");
					while ($consulta2 = mysqli_fetch_assoc($seleciona)){
	?>
					<label class="radio-inline"> 
						<input type="radio" name="situacao"  value="<?php echo $consulta2["nome"]." - ".$consulta2['partido']; ?><?php echo $consulta2['id_candidato']; ?>"><span class="label label-success"><?php echo $consulta2["nome"]." - ".$consulta2['partido'];?><?php echo $consulta2['id_candidato']; ?></span> 
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
    <br><br>
<br>
    <?php include('rodape.php');?>
  </body>
</html>