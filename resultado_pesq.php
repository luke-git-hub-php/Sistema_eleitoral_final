	<?php
require ("cabecalho.php");?>
	<div class="container">
<br><br>
<div class="col-lg-12">	
            <h2 class="page-header" align="center">Resultados</h2>
            </div>
			<?php	
$con=mysqli_connect('localhost','root','','votacao');

	$consulta = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$eleitor = "SELECT nome , numero FROM eleitor WHERE nome LIKE '%$consulta%' ";
	$resultado_eleitores = mysqli_query($con, $eleitor);         
	
	if(mysqli_num_rows($resultado_eleitores) <= 0){
		echo "Nenhum eleitor encontrado...";
	}else{
		while($rows = mysqli_fetch_assoc($resultado_eleitores)){
			echo "<li>".utf8_encode($rows['nome'])." - ".$rows['numero']."</li>"; 
		}
	}
?>
</div>
<?php require("rodape.php");?>