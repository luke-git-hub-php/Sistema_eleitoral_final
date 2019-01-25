<!DOCTYPE html>
<html>
<head>
	<title>Votar</title>
	
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
	<?php
@$conexao=mysqli_connect('localhost','root','','votacao');

	
?>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<div class="jumbotron text-center"><h1 class="alert-dismissable">Votação</h1></div>
			</div>
			<form class="form-horizontal" method="POST" action="votar.php">	


</head>
<body>
<br><br>
 <div class="container">

				<div class="row">
						
						<div align="center">
						 <form class="form-inline" method="POST" action="voto.php">
	<div class="form-group">
		<label for="eleitor">Digite o titulo de eleitor :</label>
		<input type="text" id="input-group-lg" class="dica"  name="titulo">
	</div>
	<br><br>
<input type="submit" name="cadastrar" id="cadastrar" value="Votar" class="btn btn-primary">
</form>
</div>
			
	<?php
@$num_titulo = $_POST['titulo'];
@$botao = $_POST['cadastrar'];
$query_select="SELECT voto FROM eleitor";
$select=mysqli_query($conexao,$query_select);
$array=mysqli_fetch_array($select);
$logarray=$array['voto'];
if($botao){  
$verificar_titulo = mysqli_query($conexao, "SELECT * from eleitor where numero='$num_titulo'");
$verificar_voto = mysqli_query($conexao, "SELECT * from eleitor where voto = 1 and numero = '$num_titulo'");
$rows1 = mysqli_num_rows($verificar_titulo);
$rows2 = mysqli_num_rows($logarray);

if($rows2 ==1){
	echo "<script type='text/javascript'>alert('O(a) senhor(a) já votou nessas eleições. Por favor aguarde novas eleições!');window.location.href = 'cadastrar_eleitor.php';</script>";
}else{
	if($rows1 == 1){
		$votou = mysqli_query($conexao, "UPDATE eleitor set voto = 1 where numero = '$num_titulo'");
		echo "<script type='text/javascript'>alert('Vote com consciência');window.location.href = 'votar.php';</script>";
		}else{
		echo "<script type='text/javascript'>alert('Título de eleitor não cadastrado!')";
	}
}

}

	    mysqli_close($conexao);?>
<?php
include ("rodape.php");

?>

</body>
</html>