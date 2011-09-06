<?php
session_start();
session_destroy();
$nome = $_POST["nome"];
$senha = $_POST["senha"];

include "conectamysql.php";
session_start();
$resultado = mysql_query ("SELECT * FROM usuarios where nomeUsuario='".addslashes($nome)."'");
$linhas = mysql_num_rows ($resultado);

if (empty($nome) OR empty($senha)){
	$_SESSION['msg'] =  "<p align =\"center\">Digite o  usuário e senha para efetuar o Login!</p>";
	header("Location: index.php");
}

if ($linhas == 0)
{
	$_SESSION['msg'] = "<p align =\"center\">Usuário não encontrado!</p>";
	header("Location: index.php");

}
else
{
	if($senha != mysql_result($resultado, 0, "senhaUsuario"))
	{
		$_SESSION['msg'] =  "<p align =\"center\">Senha Incorreta!</p>";
		header("Location: index.php");
	}
	else
	{
		
		$_SESSION['nome_usuario'] = $nome;
	
		//direciona para a página inicial dos usuários cadastrados
		header("Location: inicio.php");
	}
}

mysql_close($conexao);

?>
