<?php include "verifica.php"; ?>

<?php
if (getenv("REQUEST_METHOD") == "POST") {
    foreach ($_POST as $chave => $valor) {
        $_SESSION['cadFormulario'][$chave] = $valor;
    }
    header("Location: cadastrarComunitarioH.php");
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
                if(!check_date(document.getElementById('dt_entrevista'))){
                    alert("A data digitada é inválida");
                    return false;
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
                    <? include "msg.php";?>
                    <form action="" method="POST" onsubmit="return validar();">
                        <div class="form_item">
                            <div class="heading">
                                <h2>Cadastro Acorjuve - Etapa 1</h2>
                            </div>
                            <div class="cfclear">&nbsp;</div>
                        </div>

                        <fieldset>
                            <legend><label class="label"><b>  DADOS DA ENTREVISTA  </b></label></legend>
                            <div class="cfclear">&nbsp;</div>
                            <div class="cfclear">&nbsp;</div>

                            <!--Campo entrevistador-->
                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">Entrevistador:</label>
                                    <select name="familia[codEntrevistador]" class="cf_inputbox validate-selection" id="codEntrevistador" style="width: 300px;" > <? include("buscaEntrevistador.php"); ?></select>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <!--Campo data da entrevista-->
                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">Data da Entrevista:</label>

                                    <input class="input_num" style="width: 300px;" maxlength="150" size="30" title="" id="dt_entrevista" name="familia[dt_entrevista]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <!--Campo comunidade-->
                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">Comunidade:</label>

                                    <select name="familia[codComunidade]" class="cf_inputbox validate-selection" id="familia[codComunidade]" style="width: 300px;" >
<?php include("buscaComunidade.php"); ?>
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
