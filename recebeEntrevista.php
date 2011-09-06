<?php
include "conectamysql.php";
$entrevistador = $_POST["entrevistador"];
$dataEntrevista = $_POST["dataEntrevista"];
$comunidade  = $_POST["comunidade"];
$codFamilia = $_POST["codFamilia"];

if ($familia == ""){
	echo "Digite o nome da familia!";
	include "cadastrarEntrevista.php";
}
else{

$codFamilia = mysql_insert_id("codFamilia");

mysql_query("INSERT INTO entrevista VALUES (null, '$familia')");
$linha = mysql_affected_rows ();
echo "<p>Familia cadastrada com sucesso!</p>";
include "cadastrarEntrevista.php";
}

?>
