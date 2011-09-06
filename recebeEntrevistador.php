<?php
include("verifica.php");
include "conectamysql.php";
$nome = $_POST['entrevistador']['entrevistador'];
if (empty($nome)) {
    $_SESSION['msg'] = "Digite um nome para o entrevistador.";
    header("Location: cadastrarEntrevistador.php");
} else {
    mysql_query("INSERT INTO entrevistador (entrevistador) VALUES ('$nome')") or die(mysql_error());
    $_SESSION['msg'] = "Entrevistador cadastrado com sucesso!";
    header("Location: cadastrarEntrevistador.php");
}

?>


