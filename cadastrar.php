<?php include('cabecalho.php');?>
<?php
	
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "Votacao";
	//Criar a conexao
	$conn = mysqli_connect("localhost","root","","votacao");
	
	$situacao = $_POST['situacao'];
	$consulta=$_POST['numero'];
	
 $seleciona= mysqli_query($conn, "select numero from eleitor");

  $votacao= mysqli_query($conn, "select * from votacao where numero='$consulta' ");
  $query_select="SELECT numero FROM votacao WHERE numero='$consulta'";
  $query_select2="SELECT numero FROM eleitor WHERE numero='$consulta'";
$select=mysqli_query($conn,$query_select);
$select2=mysqli_query($conn,$query_select2);
$array=mysqli_fetch_array($select);
$converte=mysqli_fetch_array($select2);
$logarray=$array['numero'];
$array_eleitor=$converte['numero'];
if($consulta=="" || $consulta==null || $situacao== null){
 echo "<script language='javascript' type='text/javascript'>
 	  alert('O campo Títilo deve ser preenchido !!!');window.location.href='form.php';
 	</script>";
}else{
	if($logarray==$consulta){
		echo "<script language='javascript' type='text/javascript'>
 	  alert('Esse Eleitor  já votou !!!');window.location.href='form.php';
 	</script>";
 	die();	
}else{
	if($consulta!=$array_eleitor){
	  echo "<script language='javascript' type='text/javascript'>
 	  alert('Título inválido !');window.location.href='form.php';
 	</script>";	
	}
	
	else{
		$result_imoveis = "INSERT INTO votacao (id_voto,voto,numero) VALUES ('','$situacao',$consulta)";
	$resultado_imoveis = mysqli_query($conn, $result_imoveis);
		  echo "<script language='javascript' type='text/javascript'>
 	  alert('Você votou !!!');
 	</script>";	
 	echo "<h1>"."Seu voto foi em: ". $situacao."</h1>";
	}

	}
  }mysqli_close($conn);?>
<?php include('rodape.php');?>
