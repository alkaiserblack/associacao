<?php

include "conectamysql.php";

session_start();
if (empty($_SESSION['cadFormulario']) OR !is_array($_SESSION['cadFormulario'])) {
    $_SESSION['msg'] = "Acesso ilegal ao dispositivo";
    header("Location: inicio.php");
}
if(empty($_SESSION['cadFormulario']['cadastroComunitarioH']) AND empty($_SESSION['cadFormulario']['cadastroComunitarioH'])){
    $_SESSION['msg'] = "Um homem ou uma mulher é requerido";
    header("Location: cadastrarComunitarioH.php");
}


//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
/*
 * Peparando o sql da tb familia
 */

$familia = $_SESSION['cadFormulario']['familia'];
// arrumando a data
$familia['dt_entrevista'] = implode("-", array_reverse(explode("/", $familia['dt_entrevista'])));
/*
 * Função Pulica
 */


foreach ($familia as $key => $value) {
    $values[] = '"' . addslashes($value) . '"';
    $fields[] = $key;
}
$sql = "INSERT INTO familia (" . implode(",", $fields) . ") VALUES (" . implode(",", $values) . ")";
if (mysql_query($sql)) {
    $id_familia = mysql_insert_id();
} else {
    die("Não foi possível incluir a familia no banco: " . mysql_error()); //Dennie, tu tem que redirecionar para algum lugar isso e tratar esse erro
}
//echo 'SQL Familia: ' . $sql . "<br />";

/*
 * Prepanrando os inserts do pai e/ou a mãe
 */
//limpando as variáveis...

/*
 * PAI
 */
$values = array();
$fields = array();
$cd = $_SESSION['cadFormulario']['cadastroComunitarioH'];
if (!empty($cd['nomeDaPessoa'])) { //checo se o nome está vazio, se náo estiver executa o if
    /*
     * funcao pública
     */
    if ($cd['funcaoPublica'] == 'Sim') {//exerce função pública
        if (!empty($cd['codQualFuncaoPublica'])) { //checa se selecionou uma função publica se não não insere
            $fp['codQualFuncaoPublica'] = $cd['codQualFuncaoPublica'];
        }
    }
    //remove a variáveis que não vão na cadastroComunitario
    unset($cd['codQualFuncaoPublica']);

    //arrumando a data de nascimento...
    $cd['dt_nasc'] = implode("-", array_reverse(explode("/", $cd['dt_nasc'])));
    $cd['moraDesdeQuando'] = implode("-", array_reverse(explode("/", $cd['moraDesdeQuando']))); //moraDesdeQuando
    //adicionando o id da família
    $cd['codFamilia'] = $id_familia;
    foreach ($cd as $key => $value) {
        $values[] = '"' . addslashes($value) . '"';
        $fields[] = $key;
    }

    $sql = "INSERT INTO cadastroComunitario (" . implode(",", $fields) . ") VALUES (" . implode(",", $values) . ")";
    if (!mysql_query($sql)) {
        die("Não foi possível incluir o cadastro do homem no banco: " . mysql_error() . " - " . $sql);
    } else {
        /*
         * Inserindo a funcaoPublica
         */
        if (isset($fp['codQualFuncaoPublica']) AND !empty($fp['codQualFuncaoPublica'])) {
            $values = array();
            $fields = array();
            $fp['codCadastroComunitario'] = mysql_insert_id(); //pega o id da pessoa
            foreach ($fp as $key => $value) {
                $values[] = '"' . addslashes($value) . '"';
                $fields[] = $key;
            }
            $sqlF = "INSERT INTO funcaoPublica (" . implode(",", $fields) . ") VALUES (" . implode(",", $values) . ")";
            if (!mysql_query($sqlF)) {
                die("Não foi possível incluir funcaoPublica no banco: " . mysql_error() . " - " . $sqlF);
            }
            //echo 'SQL funcaoPublica: ' . $sqlF . "<br />";
        }
    }
}
//echo 'SQL Homem: ' . $sql . "<br />";
/*
 * MAE
 */
$values = array();
$fields = array();

$cd = $_SESSION['cadFormulario']['cadastroComunitarioM'];
if (!empty($cd['nomeDaPessoa'])) { //checo se o nome está vazio, se náo estiver executa o if
    if ($cd['funcaoPublica'] == 'Sim') {//exerce função pública
        if (!empty($cd['codQualFuncaoPublica'])) { //checa se selecionou uma função publica se não não insere
            $fp['codQualFuncaoPublica'] = $cd['codQualFuncaoPublica'];
        }
    }
    //remove a variáveis que não vão na cadastroComunitario
    unset($cd['codQualFuncaoPublica']);
    //arrumando a data de nascimento...
    $cd['dt_nasc'] = implode("-", array_reverse(explode("/", $cd['dt_nasc'])));
    $cd['moraDesdeQuando'] = implode("-", array_reverse(explode("/", $cd['moraDesdeQuando']))); //moraDesdeQuando
    //adicionando o id da família
    $cd['codFamilia'] = $id_familia;
    foreach ($cd as $key => $value) {
        $values[] = '"' . addslashes($value) . '"';
        $fields[] = $key;
    }

    $sql = "INSERT INTO cadastroComunitario (" . implode(",", $fields) . ") VALUES (" . implode(",", $values) . ")";
    if (!mysql_query($sql)) {
        die("Não foi possível incluir o cadastro da Mulher no banco: " . mysql_error() . " - " . $sql);
    } else {
        /*
         * Inserindo a funcaoPublica
         */
        if (isset($fp['codQualFuncaoPublica']) AND !empty($fp['codQualFuncaoPublica'])) {
            $values = array();
            $fields = array();
            $fp['codCadastroComunitario'] = mysql_insert_id(); //pega o id da pessoa
            foreach ($fp as $key => $value) {
                $values[] = '"' . addslashes($value) . '"';
                $fields[] = $key;
            }
            $sqlF = "INSERT INTO funcaoPublica (" . implode(",", $fields) . ") VALUES (" . implode(",", $values) . ")";
            if (!mysql_query($sqlF)) {
                die("Não foi possível incluir funcaoPublica no banco: " . mysql_error() . " - " . $sqlF);
            }
            //echo 'SQL funcaoPublica: ' . $sqlF . "<br />";
        }
    }
}
//echo 'SQL Mulher: ' . $sql . "<br />";

/*
 * QUESTAO FUNDIÁRIA
 */
$values = array();
$fields = array();

$cd = $_SESSION['cadFormulario']['questaoFundiaria'];

$cd['codFamilia'] = $id_familia;
foreach ($cd as $key => $value) {
    $values[] = '"' . addslashes($value) . '"';
    $fields[] = $key;
}

$sql = "INSERT INTO questaoFundiaria (" . implode(",", $fields) . ") VALUES (" . implode(",", $values) . ")";
if (!mysql_query($sql)) {
    die("Não foi possível incluir a questão fundiária no banco: " . mysql_error());
}

//echo 'SQL Questão fundiaria: ' . $sql . "<br />";

/*
 * Processando as fontes de renda.
 */
/*
 * #############NOTA!!!
 * Adicionei um option no arquivo buscaNomeFonteDeRenda com o valor ZERO(0) para saber se a pessoa escolheu ou não
 * ignorarei todos que preencheram zero
 */
$cd = $_SESSION['cadFormulario']['fonteDeRenda'];
foreach ($cd as $in) {
    if (!empty($in['codNomeFonteDeRenda'])) {//aqui eu checo se é zero o valor se não for executo o if
        /*
         * adicionando o id da familia
         */
        $in['codFamilia'] = $id_familia;
        $values = array();
        $fields = array();
        foreach ($in as $key => $value) {
            $values[] = '"' . addslashes($value) . '"';
            $fields[] = $key;
        }

        $sql = "INSERT INTO fonteDeRenda (" . implode(",", $fields) . ") VALUES (" . implode(",", $values) . ")";
        if (!mysql_query($sql)) {
            die("Não foi possível incluir a fonte de renda no banco: " . mysql_error());
        }
        //echo 'SQL fonteDeRenda: ' . $sql . "<br />";
    }
}
/*
 * Composição residencial
 */

$cd = $_SESSION['cadFormulario']['composicaoResidencial'];
foreach ($cd as $in) {
    if (!empty($in['nomeCompleto'])) {//aqui eu checo se o nome tá vazio se não for executo o if
        /*
         * adicionando o id da familia
         */
        $in['codFamilia'] = $id_familia;
        // arrumando a data de nascimento:
        $in['dataDeNascimento'] = implode("-", array_reverse(explode("/", $in['dataDeNascimento'])));
        $values = array();
        $fields = array();
        foreach ($in as $key => $value) {
            $values[] = '"' . addslashes($value) . '"';
            $fields[] = $key;
        }

        $sql = "INSERT INTO composicaoResidencial (" . implode(",", $fields) . ") VALUES (" . implode(",", $values) . ")";
        if (!mysql_query($sql)) {
            die("Não foi possível incluir a composição residencial no banco: " . mysql_error());
        }
        //echo 'SQL composicaoResidencial: ' . $sql . "<br />";
    }
}
/*
 * Se ele chegou até aqui é pq tá ok!
 */
//limpando a secao
unset($_SESSION['cadFormulario']);
$_SESSION['msg'] = "Cadastro efetuado com sucesso!<br />Número par acontrole: " . $id_familia;
header("Location: inicio.php");


/*
  echo '<br />';
  echo '<br />';
  print_r($familia);

  print_r($_SESSION);
  echo '</pre>'; */
?>
