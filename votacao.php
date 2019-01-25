<HTML>
<HEAD>
<TITLE>votação</TITLE>
</HEAD>
<BODY>
<FONT SIZE="3">Qual a sua base de dados preferida?</FONT><BR>
<FORM NAME="votação" ACTION="votacao.php" METHOD="POST">
<INPUT TYPE="radio" NAME="escolha" VALUE="1">Lula<BR>
<INPUT TYPE="radio" NAME="escolha" VALUE="2">msSQL<BR>
<INPUT TYPE="text" NAME="voto" ><BR>
<INPUT TYPE="submit" value="Votar"><BR>

<?php $conecta=mysqli_connect('localhost','root','','votacao') or die(mysqli_error());

$voto=$_POST['voto'];
 $query = mysqli_query($conecta,"insert into votacao(id
 	_voto, can1) values('','$voto')");
?>
</FORM>
</BODY>
</HTML>
 

<?php
 
/*if ($escolha != "") { // Verifica se foi inserido um voto e prossegue em frente no caso de verdade
 
// Variáveis a serem alteradas
 

 
$num_resp = ""; // número de opções na tua votação
$pergunta = ""; // pergunta da votação
 
// Nada mais a ser alterado
 
@$mysql_dtbs=mysqli_connect('localhost','root','','votacao') or die(mysqli_error());
// ligação ao MySQL
 
$radio = $num_resp + 1;
// para uso posterior
 
mysql_select_db($mysql_dtbs);
// seleciona a base de dados
 
// aqui começa todo o trabalho do PHP para atualizar a base de dados
 
$query_upd = "SELECT * FROM votacao WHERE id_voto=$escolha";
$resul_upd = mysql_query($query_upd);
// aqui o PHP seleciona apenas os registos que coincidem com a escolha, neste 
// caso so uma opção
 
$obj_upd = mysql_fetch_object($resul_upd);
// o comando mysql_fetch_object() separa os resultados de uma query por colunas
// neste caso, $obj_upd -> descrição da opção que o utilizador votou
 
$vot_upd = $obj_upd->votos;
$vot_upd++;
// separa só os votos e adicinona mais um voto
 
$upd_upd = "UPDATE votocao SET can1=$vot_upd WHERE id_voto=$escolha";
mysql_query($upd_upd);
// atualizou a base de dados
 
// Agora o PHP fará a pesquisa na base de dados e retornará as opções, seus 
// respectivos votos, total de votos e a sua escolha.
 
echo "<H3>" . $pergunta . "</H3>";
 
for($i=1;$i<$radio;$i++) {
 
$query[$i] = "SELECT * FROM votação WHERE id_voto=$i";
$resul[$i] = mysql_query($query[$i]);
$objet[$i] = mysql_fetch_object($resul[$i]);
 
echo "<B>" . $objet[$i]->opcao . "</B> " . $objet[$i]->descricao . "<B> " . $objet[$i]->votos ."</B><br>";
 
$tot_vt += $objet[$i]->votos;
 
// tudo isto serve para requisitar o resultado de cada opção e exibir na tela
 
}
echo "<B>Total de votos:</B>" . $tot_vt . "&nbsp;&nbsp;&nbsp;<B>Sua Escolha</B>:" . $escolha . "</FONT></FONT>";
}*/
?>

 