<?php
include "verifica.php";
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
    header("Location: recebeCadastrarFormulario.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title></title>
        <meta name="GENERATOR" content="Quanta Plus" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="acorjuve.css">
        <script>
            function check_date(DATA){
                var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
                var msgErro = 'Formato inválido de data.';
                var vdt = new Date();
                var vdia = vdt.getDay();
                var vmes = vdt.getMonth();
                var vano = vdt.getYear();
                if ((DATA.value.match(expReg)) && (DATA.value != '')) {
                    var dia = DATA.value.substring(0, 2);
                    var mes = DATA.value.substring(3, 5);
                    var ano = DATA.value.substring(6, 10);
                    if ((mes == 04 && dia > 30) || (mes == 06 && dia > 30) || (mes == 09 && dia > 30) || (mes == 11 && dia > 30)) {
                        return false;
                    }
                    else { //1
                        if (ano % 4 != 0 && mes == 2 && dia > 28) {

                            return false;
                        }
                        else { //2
                            if (ano % 4 == 0 && mes == 2 && dia > 29) {
                                return false;
                            }
                            else { //3
                                return true;
                            } //3-else
                        }//2-else
                    }//1-else
                }
            else { //5
                return false;
            } //5-else
        }
        function validar(){
            for(i=0;i<12;i++){
                if(document.getElementById('composicaoResidencial['+i+'][nomeCompleto]').value != ''){
                    if(!check_date(document.getElementById('composicaoResidencial['+i+'][dataDeNascimento]'))){
                        alert("A data de nascimento digitada no quadro "+(i+1)+" é inválida, "+document.getElementById('composicaoResidencial['+i+'][dataDeNascimento]').value);
                        return false;
                    }
                }
            }

            return true;
        }
        </script>
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
                    <form action="" method="POST" onsubmit="return validar()">
                        <div class="form_item">
                            <div class="heading">
                                <h2>Cadastro Acorjuve - Etapa 8 de X</h2>
                            </div>
                            <div class="cfclear">&nbsp;</div>
                        </div>
                        <? for ($i = 0; $i < 12; $i++) {
                        ?>
                            <fieldset>
                                <legend><label class="label"><b>  DADOS DA COMPOSIÇÃO RESIDENCIAL - QUADRO <?=$i+1;?> </b></label></legend>
                                <div class="cfclear">&nbsp;</div>
                                <div class="cfclear">&nbsp;</div>

                                <!--Campo nome completo-->
                                <div class="form_item">
                                    <div class="form_textbox">
                                        <label class="label" style="width: 150px;">Nome completo:</label>
                                        <input name="composicaoResidencial[<?= $i; ?>][nomeCompleto]" type="text" class="input_num" id="composicaoResidencial[<?= $i; ?>][nomeCompleto]" style="width: 300px;" size="30" maxlength="150" />

                                    </div>
                                    <div class="cfclear">&nbsp;</div>
                                </div>

                                <!--Campo data de nascimento-->
                                <div class="form_item">
                                    <div class="form_textbox">
                                        <label class="label" style="width: 150px;">Data de nascimento:</label>
                                        <input name="composicaoResidencial[<?= $i; ?>][dataDeNascimento]" type="text" class="input_num" id="composicaoResidencial[<?= $i; ?>][dataDeNascimento]" style="width: 300px;" size="30" maxlength="150"/>
                                    </div>
                                    <div class="cfclear">&nbsp;</div>
                                </div>

                                <!--Campo parentesco-->
                                <div class="form_item">
                                    <div class="form_textbox">
                                        <label class="label" style="width: 150px;">Relação de parentesco:</label>
                                        <select name="composicaoResidencial[<?= $i; ?>][parentesco]" class="cf_inputbox validate-selection" id="composicaoResidencial[<?= $i; ?>][parentesco]" style="width: 300px;" > <? include("buscaParentesco.php"); ?></select>

                                    </div>
                                    <div class="cfclear">&nbsp;</div>
                                </div>

                                <!--Campo está em RB-->
                                <div class="form_item">
                                    <div class="form_textbox1">
                                        <label class="label" style="width: 180px;">Está em RB?</label>
                                        <input value="Sim" title="Sim" name="composicaoResidencial[<?= $i; ?>][estaEmRB]" type="radio" checked>Sim
                                        <input value="Nao" title="Nao" name="composicaoResidencial[<?= $i; ?>][estaEmRB]" type="radio">Nao
                                    </div>
                                    <div class="cfclear">&nbsp;</div>
                                </div>

                                <!--Campo principal fonte de renda-->
                                <div class="form_item">
                                    <div class="form_textbox">
                                        <label class="label" style="width: 150px;">Principal fonte de renda:</label>
                                        <input class="input_num" style="width: 300px;" maxlength="150" size="30" title="" id="text_5" name="composicaoResidencial[<?= $i; ?>][nomePrincipalFonteDeRenda]" type="text" />

                                    </div>
                                    <div class="cfclear">&nbsp;</div>
                                </div>

                                <!--Campo série de estudo-->
                                <div class="form_item">
                                    <div class="form_textbox">
                                        <label class="label" style="width: 150px;">Série de estudo:</label>
                                        <select name="composicaoResidencial[<?= $i; ?>][codEscolaridade]" class="cf_inputbox validate-selection" id="composicaoResidencial[<?= $i; ?>][codEscolaridade]" style="width: 300px;" > <? include("buscaEscolaridade.php"); ?></select>

                                    </div>
                                    <div class="cfclear">&nbsp;</div>
                                </div>

                                <!--Campo renda mensal-->
                                <div class="form_item">
                                    <div class="form_textbox">
                                        <label class="label" style="width: 150px;">Renda mensal:</label>
                                        <input class="input_num" style="width: 300px;" maxlength="150" size="30" title="" id="text_5" name="composicaoResidencial[<?= $i; ?>][rendaMensal]" type="text" />

                                    </div>
                                    <div class="cfclear">&nbsp;</div>
                                </div>

                            </fieldset>
                            <br>
                        <? } ?>


                        <div class="cfclear">&nbsp;</div>

                        <div class="cfclear">&nbsp;</div>

                        <!--Botão Prosseguir-->
                        <div id="bt_enviar">
                            <div class="form_element cf_button">
                                <input type="submit" value="Prosseguir >>" style="width: 110px;">
                            </div>
                        </div>


                    </form>


                </div>

                <div class="cfclear">&nbsp;</div>
                <div class="cfclear">&nbsp;</div>

            </div>
            <div id="rodape"><h6>Acorjuve</h6></div>
        </div>

    </body>
</html>
