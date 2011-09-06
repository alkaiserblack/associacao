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
    header("Location: cadastrarAvaliacaoAlcoa.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title></title>
        <meta name="generator" content="Bluefish 1.0.7"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="acorjuve.css">
    </head>

    <body>
        <div id="tudo">
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
                                    <h2>Cadastro ACORJUVE - Etapa 6 de X</h2>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>
                            <div class="cfclear">&nbsp;</div>
							<? for ($i=0;$i<12;$i++) {?>                            
                            <!--Campo nome da fonte de renda-->
                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">Nome da fonte de renda:</label>
                                    <select class="cf_inputbox validate-selection" style="width: 300px;" name="fonteDeRenda[<?=$i;?>][codNomeFonteDeRenda]" > <? include("buscaNomeFonteDeRenda.php"); ?></select>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <!--Campo valor da fonte de renda-->
                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">Valor da fonte de renda:</label>
                                    <input class="input_num" style="width: 300px;" maxlength="150" size="30" title="" id="text_5" name="fonteDeRenda[<?=$i;?>][valorFonteDeRenda]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>
                            <? }?>
                            
                            
                            
                            <!--Campo principal fonte de renda-->
                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">Principal fonte de Renda:</label>
                                    <input class="input_num" style="width: 300px;" maxlength="150" size="30" title="" id="text_5" name="questaoFundiaria[principalFonteDeRenda]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <!--Campo melhorar atividades econômicas-->
                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">Para melhorar suas atividades econômicas como a família planeja investir os recursos 				que receber da acorjuve (anotar todas as opções que a família mencionar, quanto mais detalhado melhor!):</label>
                                    <textarea class="cf_inputbox" rows="12" cols="40" name="questaoFundiaria[planejaInvestirRecursos]"></textarea>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>

                            <!--Botao Enviar-->
                            <div id="bt_enviar">
                                <div class="form_element cf_button">
                                    <input value="Prosseguir>>" type="submit" style="width: 100px;"/>
                                </div>
                            </div>
                            <div class="cfclear">&nbsp;</div>

                        </form>
                    </div>
                </div>

                <div id="rodape"><h6>Acorjuve</h6></div>

            </div>

        </div>

    </body>
</html>
