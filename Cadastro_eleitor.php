
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <script type="text/javascript" src="../jquery/jquery/jquery-1.12.3.min.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
         $('.dica + span')
         .css({display:'none',
               border: '1px solid #336600',
               padding:'2px 4px',
               background:'#00ccff',
               marginLeft:'10px'   });
         $('.dica').focus(function() {
           $(this).next().fadeIn(1500);       
         })
         .blur(function(){
          $(this).next().fadeOut(1500);
         });
       });
  </script>
  </script><script>function eventoclique(){
    document.getElementById("id2").style.color="green";
  }
  </script>
</head>
</head>    
<body>
<?php include('cabecalho.php');?>

<div class="container">
  

<form class="form-horizontal" method="POST" action="Cadastrar_eleitor.php"> 
	<fieldset><legend><div class="jumbotron text-center"><h1 class="alert-info">Formulário de Cadastro de Eleitores</h1></div></legend><br>
	
<div class="text-nowrap"><h4 id="id2">Seja Cidadão, seja Eleitor!!!<h4></div>
<div class="form-group">
<label class="radio-inline">
Nome:</label><input type="text" name="nome"><br><br></div>
<div class="form-group">
<label class="radio-inline">Título de Eleitor: </label><input type="text" name="numero"  placeholder="título de eleitor"   maxlength="14"   class="dica"><span>Apenas números!!!.</span><br><br></div>

<input type="submit"  class="btn-sm" onClick="eventoclique()" value="Cadastrar">
</div></fieldset></form>
<br>
<br><br>
</div>
<?php include('rodape.php');?>
</body>
</html>
