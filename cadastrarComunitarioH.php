<?php include "verifica.php"; ?>
<?php
if (getenv("REQUEST_METHOD") == "POST") {
    foreach ($_POST as $chave2 => $valor2) {
        $_SESSION['cadFormulario'][$chave2] = $valor2;
    }
    header("Location: cadastrarComunitarioM.php");
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
                    <? include "msg.php"; ?>
                    <form action="" method="POST" onsubmit="return validar();">

                        <div class="form_item">
                            <div class="heading">
                                <h2>Cadastro Acorjuve - Etapa 4 de X</h2>
                            </div>
                            <div class="cfclear">&nbsp;</div>
                        </div>

                        <fieldset>
                            <legend><label class="label"><b>  CADASTRO DO HOMEM - DADOS PESSOAIS  </b></label></legend>
                            <div class="cfclear">&nbsp;</div>
                            <div class="cfclear">&nbsp;</div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">1. Nome Completo:</label>
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" id="sys_nome" name="cadastroComunitarioH[nomeDaPessoa]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">1.1. Sexo:</label>
                                    <div class="float_left">
                                    <!--<input value="Feminino" title="Feminino" name="sexo" type="radio">Feminino-->
                                        <input value="Masculino" title="Masculino" name="cadastroComunitarioH[genero]" type="radio" checked>Masculino
                                    </div>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">2. Nome da Mãe:</label>
                                    <input class="input_num" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioH[nomeDaMae]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">3. Estado Civil:</label>
                                    <select class="cf_inputbox validate-selection" style="width: 300px;" name="cadastroComunitarioH[estadoCivil]">
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
                                        <input value="Sim" title="Sim" name="cadastroComunitarioH[tem_rg]" type="radio" checked>Sim
                                        <input value="Nao" title="Nao" name="cadastroComunitarioH[tem_rg]" type="radio">Nao
                                    </div>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">4.1. RG:</label>
                                    <input class="input_num" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioH[rg_num]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">4.2. Orgão Emissor:</label>
                                    <input class="input_num" style="width: 100px;" maxlength="150" size="30" name="cadastroComunitarioH[rg_emissor]" type="text" /><br>

                                    <div class="cfclear">&nbsp;</div>

                                    <label class="label" style="width: 200px;">4.3. UF:</label>
                                    <select class="cf_inputbox validate-selection" id="select_17" style="width: 60px;" size="1" name="cadastroComunitarioH[rg_uf]">
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
                                        <option value="mt">MT</option>
                                        <option value="ms">MS</option>
                                        <option value="mg">MG</option>
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
                                        <input value="Sim" title="Sim" name="cadastroComunitarioH[tem_clt]" type="radio" checked>Sim
                                        <input value="Nao" title="Nao" name="cadastroComunitarioH[tem_clt]" type="radio">Nao
                                    </div>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">Carteira Profissional:</label>
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioH[num_clt]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">Certificado de reservista:</label>
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioH[cert_reservista]" type="text"/>
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">5. CPF:</label>
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioH[cpf]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_element cf_dropdown">
                                    <label class="label" style="width: 200px;">6. Nacionalidade:</label>
                                    <select class="cf_inputbox validate-selection" style="width: 300px;" name="cadastroComunitarioH[nacionalidade]">
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
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioH[dt_nasc]" type="text" id="dt_nasc" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_element cf_dropdown">
                                    <label class="label" style="width: 200px;">8. Município de Nascimento:</label>
                                    <input class="input_text" style="width: 150px;" maxlength="150" size="30" name="cadastroComunitarioH[municipioOndeNasceu]" type="text" /><br>

                                    <div class="cfclear">&nbsp;</div>

                                    <label class="label" style="width: 200px;">UF:</label>
                                    <select class="cf_inputbox validate-selection" id="select_17" style="width: 60px;" name="cadastroComunitarioH[estadoOndeNasceu]">
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
                                        <option value="mt">MT</option>
                                        <option value="ms">MS</option>
                                        <option value="mg">MG</option>
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
                                    <input class="input_text" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioH[comunidadeBairroOndeNasceu]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">10. Estuda?</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[estuda]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[estuda]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">11. Nível de Escolaridade:</label>
                                    <input value="Alfabetizada" title="Alfabetizada" name="cadastroComunitarioH[nivelDeEscolaridade]" type="radio" checked>Alfabetizado
                                    <input value="Analfabeta" title="Analfabeta" name="cadastroComunitarioH[nivelDeEscolaridade]" type="radio">Analfabeto
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">12. Série de Estudo:</label>
                                    <select class="cf_inputbox" style="width: 300px;" name="cadastroComunitarioH[codEscolaridade]">	<?php include "buscaEscolaridade.php"; ?>
                                    </select>

                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">13. Exerce Função Pública?</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[funcaoPublica]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[funcaoPublica]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">13.1. Se sim, qual a situação funcional: </label>
                                    <input value="Efetivo" title="Efetivo" name="cadastroComunitarioH[situacaoFuncional]" type="radio" checked>Efetivo
                                    <input value="Temporario" title="Temporario" name="cadastroComunitarioH[situacaoFuncional]" type="radio">Temporário
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 200px;">13.2. Se sim, qual função exerce:</label>
                                    <select class="cf_inputbox" style="width: 300px;" name="cadastroComunitarioH[codQualFuncaoPublica]"> <?php include "buscaFuncaoPublica.php"; ?>
                                    </select>

                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label">14. É comerciante: </label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[comerciante]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[comerciante]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 180px;">15. Possui antecedentes criminais com sentença definitiva transitada em julgado:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[antecedentesCriminais]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[antecedentesCriminais]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>


                            <div class="cfclear">&nbsp;</div>
                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 180px;">16. É aposentado por invalidez:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[aposentadoPorInvalidez]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[aposentadoPorInvalidez]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 180px;">17. Renda Mensal:</label>
                                    <input class="input_num" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioH[rendaMensal]" type="text" />
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">18. É ex-beneficiária de programa nacional de reforma agrária:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[ex_pnra]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[ex_pnra]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>
                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">19. Tem problema de alcoolismo:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[alcoolismo]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[alcoolismo]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>
                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">20. É fumante:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[fumante]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[fumante]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">21. Tem algum vício:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[temVicio]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[temVicio]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

				<div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">22. Participa das reuniões da comunidade:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[participaReunioesComunidade]" type="radio" checked>Sim
                                    <input value="As Vezes" title="As Vezes" name="cadastroComunitarioH[participaReunioesComunidade]" type="radio">As vezes
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[participaReunioesComunidade]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">23. Participa das reuniões do STTR ou Z-42:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[participaReunioesSTTR]" type="radio" checked>Sim
                                    <input value="As Vezes" title="As Vezes" name="cadastroComunitarioH[participaReunioesSTTR]" type="radio">As vezes
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[participaReunioesSTTR]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">24. Participa das reuniões da Acorjuve:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[participaReunioesAcorjuve]" type="radio" checked>Sim
                                    <input value="As Vezes" title="As Vezes" name="cadastroComunitarioH[participaReunioesAcorjuve]" type="radio">As vezes
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[participaReunioesAcorjuve]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">25. Participa das Ações do Movimento Juruti Ação:</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[participaAcoesDoMovimento]" type="radio" checked>Sim
                                    <input value="As Vezes" title="As Vezes" name="cadastroComunitarioH[participaAcoesDoMovimento]" type="radio">As vezes
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[participaAcoesDoMovimento]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="cfclear">&nbsp;</div>

                            <div class="form_item">
                                <div class="form_textbox1">
                                    <label class="label" style="width: 180px;">27. É associado da Acorjuve</label>
                                    <input value="Sim" title="Sim" name="cadastroComunitarioH[associadoAcorjuve]" type="radio" checked>Sim
                                    <input value="Nao" title="Nao" name="cadastroComunitarioH[associadoAcorjuve]" type="radio">Nao
                                </div>
                                <div class="cfclear">&nbsp;</div>
                            </div>

                            <div class="form_item">
                                <div class="form_textbox">
                                    <label class="label" style="width: 180px;">28. Desde quando mora no PAE Juruti Velho:</label>
                                    <input class="input_num" style="width: 300px;" maxlength="150" size="30" name="cadastroComunitarioH[moraDesdeQuando]" type="text" />
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
