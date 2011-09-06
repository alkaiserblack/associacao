<?php include "verifica.php"; ?>

<?php
if (getenv("REQUEST_METHOD") == "POST") {
    if(empty($_SESSION['cadFormulario']['cadastroComunitarioH']['nomeDaPessoa']) AND empty($_POST['cadastroComunitarioM']['nomeDaPessoa']) )
    {        
        $_SESSION['msg'] = "É necessário um home ou uma mulher no cadastro";
        unset ($_SESSION['cadFormulario']);
        header("Location: cadastrarEntrevista.php");
        die();
    }
    foreach ($_POST as $chave3 => $valor3) {
        $_SESSION['cadFormulario'][$chave3] = $valor3;
    }
    header("Location: cadastrarQuestaoFundiaria.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>Cadastro de Famílias - ACORJUVE</title>
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
                if(document.getElementById('sys_nome').value != '') {
                    if(!check_date(document.getElementById('dt_nasc'))){
                        alert("A data de nascimento digitada é inválida");
                        return false;
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
                                <h2>Cadastro Acorjuve - Etapa 3 de X</h2>
                            </div>
                            <div class="cfclear">&nbsp;</div>
                        </div>

                        <fieldset>
                            <legend><label class="label"><b>CADASTRO DA MULHER - DADOS PESSOAIS  </b></label></legend>
                            <div class="cfclear">&nbsp;</div>
                            <div class="cfclear">&nbsp;</div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">1. Nome Completo:</label>
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioM[nomeDaPessoa]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">1.1. Sexo:</label>
                                    <div class="float_left">
                                    <input value="Feminino" title="Feminino" name="cadastroComunitarioM[genero]" type="radio" checked="checked"/>Feminino
                                        <!--<input value="Masculino" title="Masculino" name="cadastroComunitarioM[genero]" type="radio" checked>Masculino-->
                                    </div>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">2. Nome da Mãe:</label>
                                    <input class="input_num" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioM[nomeDaMae]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">3. Estado Civil:</label>
                                    <select class="cf_inputbox validate-selection" style="width: 300px;" name="cadastroComunitarioM[estadoCivil]">
                                        <option value="Casado">Casado Civil</option>
                                        <option value="Uniao Estavel">União EStável</option>
                                        <option value="Divorciado">Divorciado</option>
                                        <option value="Separado Judicialmente">Separado Judicialmente</option>
                                        <option value="Separado de Fato">Separado de Fato</option>
                                        <option value="Solteiro">Solteiro</option>
                                        <option value="Separado Emancipado">Separado Emancipado</option>
                                        <option value="Viuvo">Viúvo</option>
                                    </select>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">4. Possui Documento de Identificação?</label>
                                    <div class="float_left">
                                        <input value="Sim" title="Sim" name="cadastroComunitarioM[tem_rg]" type="radio" checked>Sim
                                        <input value="Nao" title="Nao" name="cadastroComunitarioM[tem_rg]" type="radio">Nao
                                    </div>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">4.1. RG:</label>
                                    <input class="input_num" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioM[rg_num]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">4.2. Orgão Emissor:</label>
                                    <input class="input_num" style="width: 100px;" maxlength="150" size="30" name="cadastroComunitarioM[rg_emissor]" type="text" /><br>

                                    <div class="cfclear">&nbsp;</div>

                                    <label class="label" style="width: 200px;">4.3. UF:</label>
                                    <select class="cf_inputbox validate-selection" id="select_17" style="width: 60px;" size="1" name="cadastroComunitarioM[rg_uf]">
                                        <option value="ac">AC</option>
                                        <option value="al">AL</option>
                                        <option value="ap">AP</option>
                                        <option value="am">AM</option>
                                        <option value="ba">BA</option>
                                        <option value="df">DF</option>
                                        <option value="ce">CE</option>
                                        <option value="es">ES</option>
                                        <option value="go">GO</option>
                                        <option value="ma">MA</option>
                                        <option value="mt">Mt</option>
                                        <option value="ms">MS</option>
                                        <option value="mg">mg</option>
                                        <option value="pa" selected>PA</option>
                                        <option value="pb">PB</option>
                                        <option value="pr">PR</option>
                                        <option value="pe">PE</option>
                                        <option value="pi">PI</option>
                                        <option value="rj">RJ</option>
                                        <option value="rr">RR</option>
                                        <option value="ro">RO</option>
                                        <option value="sp">SP</option>
                                        <option value="sc">SC</option>
                                        <option value="se">SE</option>
                                        <option value="to">TO</option>
                                    </select>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">4.4. Possui Carteira de Trabalho?</label>
                                    <div class="float_left">
                                        <input value="Sim" title="Sim" name="cadastroComunitarioM[tem_clt]" type="radio" checked>Sim
                                        <input value="Nao" title="Nao" name="cadastroComunitarioM[tem_clt]" type="radio">Nao
                                    </div>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">Carteira Profissional:</label>
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioM[num_clt]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">Certificado de reservista:</label>
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioM[cert_reservista]" type="text"/>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">5. CPF:</label>
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioM[cpf]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_element cf_dropdown">
                                    <label class="label" style="width: 200px;">6. Nacionalidade:</label>
                                    <select class="cf_inputbox validate-selection" style="width: 300px;" name="cadastroComunitarioM[nacionalidade]">
                                        <option value="Brasileiro" selected>Brasileiro</option>
                                        <option value="Estrangeiro">Estrangeiro</option>
                                        <option value="Brasileiro Naturalizado">Brasileiro Naturalizado</option>
                                    </select>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">7. Data de Nascimento:</label>
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioM[dt_nasc]" type="text" id="dt_nasc" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_element cf_dropdown">
                                    <label class="label" style="width: 200px;">8. Município de Nascimento:</label>
                                    <input class="input_text" style="width: 150px;" maxlength="150" size="30" name="cadastroComunitarioM[municipioOndeNasceu]" type="text" /><br>

                                    <div class="cfclear">&nbsp;</div>

                                    <label class="label" style="width: 200px;">UF:</label>
                                    <select class="cf_inputbox validate-selection" id="select_17" style="width: 60px;" name="cadastroComunitarioM[estadoOndeNasceu]">
                                        <option value="ac">AC</option>
                                        <option value="al">AL</option>
                                        <option value="ap">AP</option>
                                        <option value="am">AM</option>
                                        <option value="ba">BA</option>
                                        <option value="df">DF</option>
                                        <option value="ce">CE</option>
                                        <option value="es">ES</option>
                                        <option value="go">GO</option>
                                        <option value="ma">MA</option>
                                        <option value="mt">Mt</option>
                                        <option value="ms">MS</option>
                                        <option value="mg">mg</option>
                                        <option value="pa" selected>PA</option>
                                        <option value="pb">PB</option>
                                        <option value="pr">PR</option>
                                        <option value="pe">PE</option>
                                        <option value="pi">PI</option>
                                        <option value="rj">RJ</option>
                                        <option value="rr">RR</option>
                                        <option value="ro">RO</option>
                                        <option value="sp">SP</option>
                                        <option value="sc">SC</option>
                                        <option value="se">SE</option>
                                        <option value="to">TO</option>
                                    </select>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">9. Comunidade ou Bairro de Nascimento:</label>
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioM[comunidadeBairroOndeNasceu]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">10. Estuda?</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[estuda]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[estuda]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">11. Nível de Escolaridade:</label>
                                    <input value="Alfabetizada" title="Alfabetizada" name="cadastroComunitarioM[nivelDeEscolaridade]" type="radio" checked>Alfabetizado
                                    <input value="Analfabeta" title="Analfabeta" name="cadastroComunitarioM[nivelDeEscolaridade]" type="radio">Analfabeto
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">12. Série de Estudo:</label>
                                    <select class="cf_inputbox" style="width: 300px;" name="cadastroComunitarioM[codEscolaridade]">	<?php include "buscaEscolaridade.php"; ?>
                                    </select>

                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">13. Exerce Função Pública?</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[funcaoPublica]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[funcaoPublica]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">13.1. Se sim, qual a situação funcional: </label>
                                    <input value="Efetivo" title="Efetivo" name="cadastroComunitarioM[situacaoFuncional]" type="radio" checked>Efetivo
                                    <input value="Temporario" title="Temporario" name="cadastroComunitarioM[situacaoFuncional]" type="radio">Temporário
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">13.2. Se sim, qual função exerce:</label>
                                    <select class="cf_inputbox" style="width: 300px;" name="cadastroComunitarioM[codQualFuncaoPublica]"> <?php include "buscaFuncaoPublica.php"; ?>
                                    </select>

                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">14. É comerciante: </label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[comerciante]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[comerciante]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 180px;">15. Possui antecedentes criminais com sentença definitiva transitada em julgado:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[antecedentesCriminais]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[antecedentesCriminais]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="cfclear">&nbsp;</div>
                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 180px;">16. É aposentado por invalidez:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[aposentadoPorInvalidez]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[aposentadoPorInvalidez]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 180px;">17. Renda Mensal:</label>
                                    <input class="input_num" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioM[rendaMensal]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">18. É ex-beneficiária de programa nacional de reforma agrária:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[ex_pnra]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[ex_pnra]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>
                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">19. Tem problema de alcoolismo:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[alcoolismo]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[alcoolismo]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>
                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">20. É fumante:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[fumante]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[fumante]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">21. Tem algum vício:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[temVicio]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[temVicio]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">22. Participa das reuniões da comunidade:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[participaReunioesComunidade]" type="radio" checked>Sim
                                    <input value="As Vezes" title="As Vezes" name="cadastroComunitarioM[participaReunioesComunidade]" type="radio">As vezes
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[participaReunioesComunidade]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">23. Participa das reuniões do STTR ou Z-42:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[participaReunioesSTTR]" type="radio" checked>Sim
                                    <input value="As Vezes" title="As Vezes" name="cadastroComunitarioM[participaReunioesSTTR]" type="radio">As vezes
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[participaReunioesSTTR]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">24. Participa das reuniões da Acorjuve:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[participaReunioesAcorjuve]" type="radio" checked>Sim
                                    <input value="As Vezes" title="As Vezes" name="cadastroComunitarioM[participaReunioesAcorjuve]" type="radio">As vezes
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[participaReunioesAcorjuve]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">25. Participa das Ações do Movimento Juruti Ação:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[participaAcoesDoMovimento]" type="radio" checked>Sim
                                    <input value="As Vezes" title="As Vezes" name="cadastroComunitarioM[participaAcoesDoMovimento]" type="radio">As vezes
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[participaAcoesDoMovimento]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">27. É associado da Acorjuve</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioM[associadoAcorjuve]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioM[associadoAcorjuve]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 180px;">28. Desde quando mora no PAE Juruti Velho:</label>
                                    <input class="input_num" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioM[moraDesdeQuando]" type="text" />
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
