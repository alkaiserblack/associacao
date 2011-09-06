<?php

include "conectamysql.php";

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$nomeMae = $_POST['nomeMae'];
$estadoCivil = $_POST['estadoCivil'];
$possuiIdentidade = $_POST['possuiIdentidade']; 
$identidade = $_POST['identidade']; 
$orgaoEmissor = $_POST['orgaoEmissor'];
$uf = $_POST['uf'];
$possuiCarteiraProf = $_POST['possuiCarteiraProf'];
$carteiraProfissional = $_POST['carteiraProfissional'];
$cpf = $_POST['cpf']; 
$nacionalidade = $_POST['nacionalidade']; 
$dataNascimento = $_POST['dataNascimento'];
$municipioNascimento = $_POST['municipioNascimento'];
$estadoNascimento = $_POST['estadoNascimento'];
$comunidadeNascimento = $_POST['comunidadeNascimento'];
/*$estuda = $_POST['estuda'];
$nivelEscolaridade = $_POST['nivelEscolaridade'];
$escolaridade = $_POST['escolaridade'];
$exerceFuncao = $_POST['exerceFuncao'];
$situacaoFuncional = $_POST['situacaoFuncional'];
$funcao = $_POST['funcao'];*/
$comerciante = $_POST['comerciante'];
$antecedentesCriminais = $_POST['antecedentesCriminais'];
$aposentado = $_POST['aposentado'];
$rendaMensal = $_POST['rendaMensal'];
$exBeneficiariaPNRG = $_POST['exBeneficiariaPNRG'];
$alcoolismo = $_POST['alcoolismo'];
$fumante = $_POST['fumante'];
$vicio = $_POST['vicio'];
$reunioesComunidade = $_POST['reunioesComunidade'];
$reunioesSTTR = $_POST['reunioesSTTR'];	 
$reunioesAcorjuve = $_POST['reunioesAcorjuve'];
$acoesMovimento = $_POST['acoesMovimento'];
$associadoAcorjuve = $_POST['associadoAcorjuve'];
$desdeQuandoMora = $_POST['desdeQuandoMora'];

		$query = "INSERT INTO cadastroPessoa VALUES (null, null, '$nome', '$sexo', '$nomeMae', '$estadoCivil', '$possuiIdentidade', '$identidade', '$orgaoEmissor', '$uf', '$possuiCarteiraProf', '$carteiraProfissional', '$cpf', '$nacionalidade', '$dataNascimento', '$municipioNascimento', '$estadoNascimento', '$comunidadeNascimento', '$comerciante', '$antecedentesCriminais', '$aposentado', '$rendaMensal', '$exBeneficiariaPNRG', '$alcoolismo', '$fumante', '$vicio', '$reunioesComunidade', '$reunioesSTTR', '$reunioesAcorjuve', '$acoesMovimento', '$associadoAcorjuve', '$desdeQuandoMora', null);";

		$result = mysql_query($query);
		if($result){
			echo mysql_affected_rows()." Cadastro realizado com sucesso!!!";
			echo "$result";
			include("index.php");
		}else{
			echo $query;
			include("index.php");
		}

mysql_close($conexao);
?>
