<?php
include("verifica.php");
include "conectamysql.php";
$nome = $_POST['comunidade']['nomeComunidade'];
if (empty($nome)) {
    $_SESSION['msg'] = "Digite um nome para a comunidade";
    header("Location: cadastrarComunidade.php");
} else {
    mysql_query("INSERT INTO comunidade (nomeComunidade) VALUES ('$nome')") or die(mysql_error());
    $_SESSION['msg'] = "Comunidade cadastrada com sucesso";
    header("Location: cadastrarComunidade.php");
}

?>

