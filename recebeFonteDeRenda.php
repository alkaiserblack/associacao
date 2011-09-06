<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Cadastro de fonte de renda - Sistema Acorjuve</title>

</head>
<body>
<?php
include "conectamysql.php";
$fonteDeRenda = $_POST["fonteDeRenda"];

if ($nome == ""){
	echo "Digite a fonte de renda!";
	include "cadastrarFonteDeRenda.php";
}
else{
mysql_query("INSERT INTO tipoFonteDeRenda (tipoNomeFonteDeRenda) VALUES ('$fonteDeRenda')");
$linha = mysql_affected_rows ();
echo "<p>Fonte de renda cadastrada com sucesso!</p>";
include "cadastrarFonteDeRenda.php";
}

?>

</body>
</html>
