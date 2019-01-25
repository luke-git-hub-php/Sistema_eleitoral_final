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
        <script>
function mOver(obj) {
    obj.innerHTML = "Obridado pelo seu voto!!"
}

function mOut(obj) {
    obj.innerHTML = "Seu voto está ok!!!"
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
            <form class="form-horizontal" method="POST" action="votar.php">   


<?php
@$conexao=mysqli_connect('localhost','root','','votacao');

    
?>
<br>
         <div class="row">
           <h3 class="text-center"> Escolha seu Candidato</h3>
            
            <div class="container">
            <div class="text-center">
                
            
        <?php
        $candidato = mysqli_query($conexao, "SELECT * from candidato");
        while($linha = mysqli_fetch_assoc($candidato)){
        ?>
        <div class="form-control">
        	
  			<label class="radio-inline"> 
                        <label><input type="radio" name="situacao" value="<?php echo $linha['id_candidato']; ?>"><?php echo $linha['nome']; ?></label><span  class="label label-success"><?php echo $linha["nome"]." - ".$linha['partido'];?></span> 
                    </label> 
                    
			</div>
		<?php
	}
		?><br>
<input type="submit" name="cadastrar" id="cadastrar" value="Cadastrar" class="btn btn-primary">
        </form>    
</div></div>
<?php
@$candidato = $_POST['situacao'];
@$botao = $_POST['cadastrar'];

if($botao){
	$select = mysqli_query($conexao,"SELECT * from votacao where id_candidatos = '$candidato'");
    while($linha2 = mysqli_fetch_assoc($select)){
        $votos = $linha2['voto'] + 1;
        $update = mysqli_query($conexao, "UPDATE votacao set voto = '$votos' where id_candidatos = '$candidato'");
        @$row = mysqli_num_rows($update);
	if($row > 0){
		echo "<script type='text/javascript'>alert('Não foi possível registrar seu voto!');window.location.href = 'votar.php';</script>";
	}else{
		echo "<script type='text/javascript'>alert('Voto registrado com sucesso!')";
        echo "<script language='javascript' type='text/javascript'><meta charset=UTF-8>
      alert('Você votou !!!');
      
    </script>"; 
      
      echo '<div onmouseover="mOver(this)" onmouseout="mOut(this)" style="background-color:#cccccc; text-align: center; font-size:20px;">
"Seu voto está ok!!! <br><a href="voto.php"><br></div>';
    
echo '<div class="ui-dialog-contain">
    <button id="opener">Voltar</button>
</div>';
	}

    }
}
    mysqli_close($conexao);?>
    
  <br><br>
<br>
<?php
include ("rodape.php");

?>
</body>
</html>