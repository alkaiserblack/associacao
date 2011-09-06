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
    header("Location: cadastrarComposicaoResidencial.php");
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
                                <h2>Cadastro Acorjuve - Etapa 7 de X</h2>
                            </div>
                            <div class="cfclear">&nbsp;</div>
                        </div>

                        <fieldset>
                            <legend><label class="label"><b>  AVALIAÇÃO DA ALCOA  </b></label></legend>

                            <div class="cfclear">&nbsp;</div>
                            <div class="cfclear">&nbsp;</div>


                            <!--Campo a ALCOA trouxe algum benefício-->

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">4. A chegada da ALCOA no PAE trouxe algum beneficio para sua família?</label>
                                    <div class="float_left"> <br>
                                        <input name="questaoFundiaria[beneficiosALCOA]" type="radio" title="Sim" value="Sim" >Sim
                                        <input name="questaoFundiaria[beneficiosALCOA]" type="radio" title="Nao" value="Nao" checked>Nao
                                    </div>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">A chegada da ALCOA no PAE trouxe algum beneficio para sua família? Quais?</label>
                                    <textarea class="cf_inputbox" rows="5" id="text_24" title="" cols="40" name="questaoFundiaria[beneficiosSimALCOA]"></textarea>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">4. A chegada da ALCOA no PAE causou algum dano a sua família?</label>
                                    <div class="float_left"> <br>
                                        <input value="Sim" title="Sim" name="questaoFundiaria[danosALCOA]" type="radio" checked>Sim
                                        <input value="Nao" title="Nao" name="questaoFundiaria[danosALCOA]" type="radio" >Nao
                                    </div>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 150px;">A chegada da ALCOA no PAE causou algum dano a sua família? Quais?</label>
                                    <textarea class="cf_inputbox" rows="5" id="text_24" title="" cols="40" name="questaoFundiaria[danosSimALCOA]"></textarea>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <!--Campo avaliação da chegada da ALCOA-->
                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 180px;">Como você avalia a chegada da ALCOA no PAE?</label>
                                    <select class="cf_inputbox validate-selection" style="width: 300px;" name="questaoFundiaria[avaliacaoALCOA]">
                                        <option value="Excelente">Excelente</option>
                                        <option value="Boa">Boa</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Ruim">Ruim</option>
                                        <option value="Pessima">Péssima</option>
                                    </select>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>
                        </fieldset>

                        <div class="cfclear">&nbsp;</div>

                        <!--Botão Prosseguir-->
                        <div id="bt_enviar">
                            <div class="form_element cf_button">
                                <input type="submit" value="Prosseguir >>" style="width: 110px;">
                            </div>
                        </div>

                    </form>
                </div>
            </div>


            <div id="rodape"><h6>Acorjuve</h6></div>

        </div>

    </body>
</html>
