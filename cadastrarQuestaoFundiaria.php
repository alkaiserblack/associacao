<?php include "verifica.php"; ?>

<?php
if (getenv("REQUEST_METHOD") == "POST") {
    foreach ($_POST as $chave => $valor) {
        if (is_array($_SESSION['cadFormulario'][$chave])) {
            foreach ($valor as $k => $v) {
                $_SESSION['cadFormulario'][$chave][$k] = $v;
            }
        } else {
            $_SESSION['cadFormulario'][$chave] = $valor;
        }
    }
    //echo '<pre>';
    //print_r($_SESSION);
    header("Location: cadastrarFonteDeRenda.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title></title>
        <meta name="GENERATOR" content="Quanta Plus" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="acorjuve.css">
    </head>

    <body>
        <div id="geral">

            <div id="cabecalho"></div>
            <div id="imgcabecalho"> <div id="logout"><a href= "logout.php">Desconectar</a></div><div id="data"><?php include "data.php"; ?></div></div>

            <div id="area">
                <div id="lateral">
                    <h3>Menu Inicial</h3>
                    <div id="menu">
                        <?php include "menu.php"; ?>
                    </div>
                </div>

                <div id="formulario">
                    <form action="" method="POST">
                        <div class="form_item">
                            <div class="heading">
                                <h2>Cadastro ACORJUVE - Etapa 5 de X</h2>
                            </div>
                            <div class="cfclear">&nbsp;</div>
                        </div>

                        <fieldset>
                            <legend><label class="label"><b>  SITUAÇÃO FUNDIÁRIA DA FAMÍLIA  </b></label></legend>
                            <div class="cfclear">&nbsp;</div>
                            <div class="cfclear">&nbsp;</div>

                            <!--Campo área em que mora-->
                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">A Área em que Mora é:</label>
                                    <select class="cf_inputbox validate-selection" style="width: 300px;" name="questaoFundiaria[areaEmQueMora]" >
                                        <option value="Propria">Própria</option>
                                        <option value="Arrendada">Arrendada</option>
                                        <option value="Cedida">Cedida</option>
                                        <option value="Heranca">Herança</option>
                                        <option value="Mora com os pais">Mora com os pais</option>
                                        <option value="Nao tem area de moradia">Não tem área de Moradia</option>
                                    </select>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <!--Campo área em que trabalha-->
                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">A Área em que trabalha é:</label>
                                    <select class="cf_inputbox validate-selection" style="width: 300px;" name="questaoFundiaria[areaEmQueTrabalha]" >
                                        <option value="Propria">Própria</option>
                                        <option value="Arrendada">Arrendada</option>
                                        <option value="Cedida">Cedida</option>
                                        <option value="Heranca">Herança</option>
                                        <option value="Mora com os pais">Trabalha na área dos pais</option>
                                        <option value="Nao tem area de trabalho">Não tem área de trabalho</option>
                                    </select>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <!--Campo documento da terra-->
                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">Documento da Terra:</label>
                                    <select class="cf_inputbox validate-selection" style="width: 300px;" name="questaoFundiaria[documentoDaTerra]" >
                                        <option value="lo">LO</option>
                                        <option value="td">TD</option>
                                        <option value="escritura publica">Escritura Pública</option>
                                        <option value="recibo">Recibo</option>
                                        <option value="historico de posse da sttr">Histórico de posse da STTR</option>
                                        <option value="declaracao da acorjuve">Declaração da Acorjuve</option>
                                        <option value="nenhum documento">Nenhum documento</option>
                                    </select>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                        </fieldset>

                        <div class="cfclear">&nbsp;</div>

                        <!--Botao Enviar-->
                        <div id="bt_prosseguir">
                            <div class="form_element cf_button">
                                <input value="Prosseguir>>" type="submit" style="width: 100px;"/>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

            <div id="rodape"><h6>Acorjuve</h6></div>

        </div>

    </body>
</html>
