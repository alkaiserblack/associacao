<?php

include "verifica.php";
include "conectamysql.php";

if (getenv("REQUEST_METHOD") == "POST") {
    if (strlen($_POST['senhaUsuario']) <= 6) {
        $_SESSION['msg'] = "A senha de ter no mínimo 6 caracteres";
        header("Location: cadastrarUsuario.php");
        die();
    }
    if (strlen($_POST['emailUsuario']) < 8 || strstr($_POST['emailUsuario'], '@') == FALSE) {
        $_SESSION['msg'] = "Digite seu e-mail corretamente.<br>";
        header("Location: cadastrarUsuario.php");
        die();
    }
    foreach ($_POST as $chave => $campo) {
        $POST[$chave] = addslashes($campo);
    }
    $values = '0,"' . implode('","', $_POST) . '"';
    $sql = "INSERT INTO usuarios VALUES($values)";
    if (mysql_query($sql)) {
        $_SESSION['msg'] = "Usuário cadastrado com sucesso.";
        header("Location: cadastrarUsuario.php");
        die();
    } else {
        $_SESSION['msg'] = "Problemas com a inserção: ".mysql_error();
        header("Location: cadastrarUsuario.php");
    }
}
mysql_close($conexao);
?>
