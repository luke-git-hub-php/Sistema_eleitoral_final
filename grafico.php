<html>
<head>
	<title></title>
<style type="text/css">
		.grafico{
			position: relative;
			width: 1000px;	
			border: 1px solid #666633;
			padding: 2px;
		}
		.grafico .barra{
			display: block;
			position: relative;
			background: #33cccc;
			text-align: left;
			color:#000000;
			height: 5em;
		}
		.grafico .barra span{position: absolute;left: 9em;}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
	</script>	<style type="text/css">

#bloco {
	height: 20vh;
	background: #03738C;
}

.container {
	height: 100%;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}

#relogio {
	font-weight: light;
	color: #e8e8e8;
	font-size: 8em;
}
	</style>

	<script src="../jquery/jquery/jquery-1.11.2.min.js"></script>
	<script src="../jquery/jquery/jquery-ui.js"></script>
	<link href="../jquery/jquery/jquery-ui.css" rel="stylesheet">
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
	<style>

.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
</style>



	
</head>
<body style="text-align:center">
<?php include('cabecalho.php');?>
<?php
 $con=mysqli_connect('localhost','root','','votacao');
?>
<table class="table table-striped table-bordered table-condensed table-hover">
	<caption class="alert-success"><h1 class="text-center">Resultados da Eleição</h1></caption>
	<thead>
		<tr>
			<th>Candidatos</th>
			<th>Votos</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php
$seleciona=mysqli_query($con, "SELECT c.*, v.* from candidato as c, votacao as v where c.id_candidato = v.id_candidatos");
 $soma_total = mysqli_query($con, "SELECT sum(voto) from votacao");

  while ($linha_array=mysqli_fetch_array($soma_total)) {
     	$soma = $linha_array['sum(voto)'];
     	while($linha= mysqli_fetch_array($seleciona)){

     		$parte = $linha['voto'];
     		$nome = $linha['nome'];

     		
?>
<tbody>
		<tr><td><?php echo "Votos de ".$linha['nome'];?></td>
	<td><?php echo  $parte;?></td></tr>
	</tbody>
<?php }}?>
		<?php
		$total = mysqli_query($con, "SELECT sum(voto) from votacao");
	echo '<tr><td><h1 class="alert-danger">'."Total".'</h1></td>'.'<td><h1 class="alert-danger">'.$soma.'</h1></td></tr>';?>	
		</tr>
	
	</tbody>
</table>
<h1 class="text-center">
Gráfico</h1>
<div class="text-primary">
<?php
  
 $seleciona=mysqli_query($con, "SELECT c.*, v.* from candidato as c, votacao as v where c.id_candidato = v.id_candidatos");
 $soma_total = mysqli_query($con, "SELECT sum(voto) from votacao");
$voto_select=mysqli_query($con,"SELECT voto from votacao");
$sel=mysqli_query($con, "select * from candidato");
  while ($linha_array=mysqli_fetch_array($soma_total)) {
     	$soma = $linha_array['sum(voto)'];
     	while($linha= mysqli_fetch_array($seleciona)){

     		$parte = $linha['voto'];
     		$nome = $linha['nome'];

     		$porcentagem = ($parte * 100)/$soma;

?>
	
<div class="grafico" align="left">
<strong style="width: <?php echo (int)$porcentagem; ?>%" class="barra"><?php echo number_format($porcentagem, 1, ",", "."); ?>%<a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $linha['partido']; ?>"><?php echo "<br>".$linha['nome']; ?></a></strong>
</div>
   <?php
     	}
     }

 ?>
<!--<div class="grafico" ><strong style="width: 100%;" class="barra">100%</strong></div>-->
<center>
<p>	<div id="dialog" title="Deletará todos os dados da eleição realizada!!!">
		<p >
		<form action="grafico.php" method="POST" accept-charset="utf-8">
<div class="popup" onclick="myFunction()">Clique aqui antes de clicar em Nova Eleição
  <span class="popuptext" id="myPopup">Deletará todos os dados da eleição realizada!!! Apenas click se tiver certeza disso!!!</span>
</div>

<script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById('myPopup');
    popup.classList.toggle('show');
}
</script>
<input type="submit"  id="opener" class="btn-info" name="excluir" value="Nova Eleição">
</form>
	<?php
if(isset($_POST['excluir'])){
$delete1=mysqli_query($con,"DELETE  FROM candidato");

}
mysqli_close($con);
?>
		</p>
	</div>
</p>
</a></center>
Horário de Brasília
<div id="bloco">
		<div class="container">
			<div id="relogio"></div>
		</div>
		</div>
		<script type="text/javascript">function relogio() {
	var data = new Date();
	var horas = data.getHours();
	var minutos = data.getMinutes();
	var segundos = data.getSeconds();

	if ( horas < 10 ) {
		horas = "0" +horas;
	}

	if ( minutos < 10 ) {
		minutos = "0" +minutos
	}

	if ( segundos < 10 ) {
		segundos = "0" + segundos
	}

	document.getElementById("relogio").innerHTML = horas+":"+minutos+":"+segundos;	
}

window.setInterval("relogio()", 1000);</script>
<?php include('rodape.php');?>
</body>
</html>

<!--
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Consulta Votos</title>
	<style type="text/css">
		.grafico{
			position: relative;
			width: 200px;	
			border: 1px solid #B1D632;
			padding: 2px;
		}
		.grafico .barra{
			display: block;
			position: relative;
			background: #B1D632;
			text-align: left;
			color: #333;
			height: 2em;
		}
		.grafico .barra span{position: absolute;left: 1em;}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
	</script>
	</head>
<body>
<?php /*
include ("menu.php");
include ("conexao.php");
?>
<div class="container">
<br><br>
<div class="col-lg-12">
            <h2 class="page-header" align="center">Gráfico</h2>
            </div>
<?php
   
 $seleciona=mysqli_query($conexao,"SELECT c.*, v.* from candidato as c, votos as v where c.id_candidato = v.id_candidato");
 $somo = mysqli_query($conexao,"SELECT sum(qtd_votos) from votos");

     while ($array=mysqli_fetch_array($somo)) {
     	$soma = $array['sum(qtd_votos)'];
     	while($linha = mysqli_fetch_array($seleciona)){
     		$parte = $linha['qtd_votos'];
     		$nome = $linha['nome'];

     		$calculo = ($parte * 100)/$soma;
   ?>

   <div align="center">
<a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $linha['partido']; ?>"><?php echo "<br>".$linha['nome']; ?></a>

<div class="grafico" align="left">
<strong style="width: <?php echo (int)$calculo; ?>%" class="barra"><?php echo number_format($calculo, 1, ",", "."); ?>%</strong>
</div>
</div>
   <?php
     	}
     }
*/
 ?>
</body>
</html>

?>-->
