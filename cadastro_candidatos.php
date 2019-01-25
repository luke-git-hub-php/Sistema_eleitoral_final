<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
 <script>
function ate_txt()
{
  var x=document.getElementById("fname");
  x.value=x.value.toUpperCase();
}
</script>
<script type="text/javascript" src="../jquery/jquery/jquery-1.12.3.min.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
         $('.dica + span')
         .css({display:'none',
               border: '1px solid #336600',
               padding:'2px 4px',
               background:'#ffcc99',
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
<body>
<?php include('cabecalho.php');?>

<div id="rod"></div>
<div class="container">
<form class="form-horizontal"  method="POST" action="cadastro_candidatos.php"> 
	<fieldset><legend><div class="jumbotron text-center"><h1 class="alert-warning">Formulário de Cadastro de Candidatos</h1></div></legend><br>
	
<div class="form-group">
<label class="radio-inline">
Nome:</label><input  type="text" class="input-sm" name="nome"><br><br></div>
<div class="form-group"><label class="radio-inline">
Número:</label><input type="number" class="input-sm" name="numero"><br><br></div>
<div class="form-group"><label class="radio-inline">
Partido:</label> <input type="text"  name="partido"  class="dica" id="fname" onchange="ate_txt()"><span>Clique fora da caixa para o  texto digitado nele fiqui todo em caixa alta.</span><br><br></div>
<div class="form-group">
<label class="radio-inline">
Cargo:</label><input  type="text" class="input-inline" name="cargo"><br><br></div>

<input type="submit" class="btn-lg" value="Cadastrar">
</form></div></fieldset></div>
</body>
</html>
<?php
@$con=mysqli_connect('localhost','root','','votacao') or die(mysqli_error());


	//$seleciona = mysqli_query($con,"select id,nome from alunos");


@$nome=$_POST['nome'];
@$numero=$_POST['numero'];
@$partido=$_POST['partido'];
@$cargo=$_POST['cargo'];

if($nome=="" || $numero==""  || $partido==""){
echo "<h1 class='alert-danger' >"."Preencha todos os campos !!!"."</h1>";
}else{

    @$inserir = mysqli_query($con,"insert into candidato values('','$nome','$numero','$partido','$cargo')");
       $select = mysqli_query($con, "SELECT * from candidato where partido='$partido'");
    while($linha = mysqli_fetch_assoc($select)){
        $id = $linha['id_candidato'];
          $voto = mysqli_query($con, "INSERT into votacao values('',0,'$partido', '$id')");}
   echo "<h1 class='alert-success' >"."Cadastro realizado com sucesso !!!"."</h1>";
}
mysqli_close($con);
?><?php include('rodape.php');?>
</body>
</html>