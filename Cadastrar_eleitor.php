<?php include('cabecalho.php');?>
<?php
@$conecta=mysqli_connect('localhost','root','','votacao') or die(mysqli_error());


	//$seleciona = mysqli_query($con,"select id,nome from alunos");


$nome=$_POST['nome'];
$numero=$_POST['numero'];
$query_select="SELECT numero FROM eleitor WHERE numero='$numero'";
$select=mysqli_query($conecta,$query_select);
$array=mysqli_fetch_array($select);
$logarray=$array['numero'];
if($numero=="" || $nome==""  ){
	echo "<script language='javascript' type='text/javascript'>
 	  alert('Preencha todos os caompos !!!');window.location.href='Cadastro_eleitor.php';
 	</script>";
}else if($logarray==$numero){
		echo "<script language='javascript' type='text/javascript'>
 	  alert('Esse título de eleitor já foi cadastrado');window.location.href='Cadastro_eleitor.php';
 	</script>";
 	
}else{
		  $query = mysqli_query($conecta,"insert into eleitor values('','$nome','$numero')");
     $insert=mysqli_query($conecta,$query);
		 if($insert){
		  	echo "<script language='javascript' type='text/javascript'>
 	  alert('NÃO FOI POSSÍVEL CADASTRAR!');window.location.href='Cadastro_eleitor.php';
 	</script>";
	}else{
	echo "<script language='javascript' type='text/javascript'>
 	  alert('Eleitor cadastrado com sucesso!');window.location.href='Cadastro_eleitor.php';
 	</script>";	
	}
	}


?><?php include('rodape.php');?>