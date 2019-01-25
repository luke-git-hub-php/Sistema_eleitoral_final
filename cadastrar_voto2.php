<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
 <script src="../js/jquery/jquery-1.11.2.min.js"></script>
	<script src="../js/jquery/jquery-ui.js"></script>
	<link href="../js/jquery/jquery-ui.css" rel="stylesheet">
	<script>
	//Aplica o padrão da animação e velocidade para exibição do efeito
	$.fx.speeds._default =1000;
	$(function() {
		$("#dialog" ).dialog({
           autoOpen: false,
           show: "blind",
           hide: "explode"
		});
		$( "#opener" ).click(function() {
            $( "#dialog" ).dialog( "open" );
            return false;
		});
	});
	</script>
	<script>
function mOver(obj) {
    obj.innerHTML = "Obridado pelo seu voto!!"
}

function mOut(obj) {
    obj.innerHTML = "Seu voto está ok!!!"
}
</script>
</head>



<body>
<?php include('cabecalho.php');?>
<body>

<?php
	
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "Votacao";
	//Criar a conexao
	$conn = mysqli_connect("localhost","root","","votacao");
	
	$situacao = $_POST['situacao'];
	$consulta=$_POST['numero'];
	$id=$_POST['situacao'];
 $seleciona= mysqli_query($conn, "select numero from eleitor");


  $query_select2="SELECT numero FROM eleitor WHERE numero='$consulta'";
$select=mysqli_query($conn,$query_select2);

$array=mysqli_fetch_array($select);

$logarray=$array['numero'];

if($consulta=="" || $consulta==null || $situacao== null){
 echo "<script language='javascript' type='text/javascript'>
 	  alert('O campo Títilo deve ser preenchido !!!');window.location.href='form_votacao.php';
 	</script>";
}else{
	if($consulta!=$logarray){
	  echo "<script language='javascript' type='text/javascript'>
 	  alert('Título inválido !');window.location.href='form_votacao.php';
 	</script>";	
	
	
}else{
		$verifica_titulo = mysqli_query($conn, "SELECT * from eleitor where numero = '$consulta'");
$verifica_voto = mysqli_query($conn, "SELECT * from eleitor where voto = 1 and numero = '$consulta'");
$linha1 = mysqli_num_rows($verifica_titulo);
$linha2 = mysqli_num_rows($verifica_voto);
if($linha2 == 1){
	
}else if($linha1 == 1){
		$votou= mysqli_query($conn, "UPDATE eleitor set voto = 1 where numero = '$consulta'");
$select = mysqli_query($conn, "SELECT * from votacao where id_candidatos = '$id'");
  while($linha = mysqli_fetch_assoc($select)){
        $votos = $linha['voto'] + 1;
       $update = mysqli_query($conn, "UPDATE votacao set voto = '$votos' where id_candidatos = '$id'");
        $row = mysqli_num_rows($update);
	if($row > 0){
		echo "<script type='text/javascript'>alert('Título de eleitor não cadastrado!!');window.location.href = 'form_votacao.php';</script>";
	}else{
		echo "<script type='text/javascript'>alert('Voto registrado com sucesso!');window.location.href = 'Index.php';</script>";
	}
	
		}	
	  echo "<script language='javascript' type='text/javascript'><meta charset=UTF-8>
 	  alert('Você votou !!!');
 	  
 	</script>";	
 	  echo '<div class="text-center">'.'<h1 class="alert-success" >'.'Seu voto foi em: '. $situacao.'</h1>'.'</div>';
 	
	}

	}
  }mysqli_close($conn);?>

	<div onmouseover="mOver(this)" onmouseout="mOut(this)" style="background-color:#cccccc; text-align: center; font-size:20px;" >
<?php echo 'Seu voto está ok!!! ', '<br><a href="form_votacao.php"><br>';?></div>
	
<div class="ui-dialog-contain">
	<button id="opener">Voltar</button>
</div>
  <br><br>
<br>
 <br><br>
<br>

  <br><br>
<br>
 <br><br>
<br>

  <br><br>
<br><br>
<br><br>
<br><br>
<?php include('rodape.php');?>
</body>
</html>