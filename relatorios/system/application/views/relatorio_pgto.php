<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>Relatórios - ACORJUVE</title>
        <meta name="GENERATOR" content="Quanta Plus" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../acorjuve.css">
        <script  language="javascript" type="text/javascript"  src="<?= base_url(); ?>../js/jquery-1.4.2.min.js"></script>
        <script  language="javascript" type="text/javascript"   src="<?= base_url(); ?>../js/jquery.maskedinput-1.2.2.min.js"></script>
        <script  language="javascript" type="text/javascript"   src="<?= base_url(); ?>../js/jquery.maskMoney.js"></script>
        <script>
            $(function($){
                $(".m-data").mask("99/99/9999");
                $(".m-fone").mask("(99)9999-9999");
                $(".m-cpf").mask("999.999.999-99");
                $(".m-cnpj").mask("99.999.999/9999-99");
                $(".m-cep").mask("99999-999");
                $(".m-money").maskMoney({symbol:"R$", decimal:",", thousands:"."});
                $(".m-float").maskMoney({symbol:"", decimal:",", thousands:"."});
                $(".m-int").bind('keypress',function (e){
                    if(e.charCode < 20 ){ //caracteres de controle
                        return true;
                    }
                    if(String.fromCharCode(e.charCode).match(/[0-9]/g)){
                        return true;
                    }
                    return false
                });
            });
        </script>
        <style>
            .rel_title{
                background: #cccccc;
            }
            .col_header{
                background: #e8eae4;
            }
        </style>
    </head>

    <body>

        <div id="geral">

            <div id="cabecalho"></div>
            <div id="imgcabecalho"> <div id="logout"><a href= "logout.php">Desconectar</a></div><div id="data">Santarém-PA, 22 de Outubro de 2010</div></div>

            <div id="area">
                <div id="lateral">
                    <h3>Menu Inicial</h3>
                    <div id="menu">
                        <? include getcwd() . "/../menu.php"; ?>
                    </div>
                </div>

                <h3>Lista de pessoas</h3>
                <div id="formulario">
                    <form action="" method="POST" onsubmit="return validaForm()">
                        <div class="datagrid">
                            <table>
                                <tr>
                                    <td colspan="4"><label>Montante dispoível: R$<input type="text" name="montante" id="montante" class="textfield m-float"></label>(Valor TOTAL DISPONÍVEL)</td>

                                </tr>
                                <tr>
                                    <th>Cod. Família</th>
                                    <th>Comunitário</th>
                                    <th class="col_header" width="10%">Pessoas na Casa(não conta os pais)</th>
                                    <th width="60">%extra</th>
                                </tr>
                                <?php
                                $familias = $this->dbpessoa->getFamilias();
                                foreach ($familias->result() as $familia) {
                                    $jsFamilias[] = $familia->codFamilia;
                                ?>
                                    <tr>
                                        <td><?php echo $familia->codFamilia; ?></td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <th class="col_header" width="20%">Nome da Pessoa</th>
                                                    <th class="col_header" width="40%">Reuniões/Associações</th>

                                                    <th class="col_header" width="20%">Economia Tradicional</th>
                                                    <th class="col_header" width="10%">Comerciante</th>
                                                </tr>
                                            <?php
                                            $rs = $this->dbpessoa->getPessoaCartao($familia->codFamilia);
                                            $familia = $familia->codFamilia;
                                            $extra_final = 0.00;
                                            foreach ($rs->result() as $row) {
                                                $extra = 0.00;


                                                /*
                                                 * se participa das reuniões. 5% cada item
                                                 */
                                                if ($row->participaReunioesComunidade != 'nao' AND !empty($row->participaReunioesComunidade)) {
                                                    $extra += 0.05;
                                                }
                                                if ($row->participaReunioesSTTR != 'nao' AND !empty($row->participaReunioesSTTR)) {
                                                    $extra += 0.05;
                                                }
                                                if ($row->participaAcoesDoMovimento != 'nao' AND !empty($row->participaAcoesDoMovimento)) {
                                                    $extra += 0.05;
                                                }
                                                if ($row->participaReunioesAcorjuve != 'nao' AND !empty($row->participaReunioesAcorjuve)) {
                                                    $extra += 0.05;
                                                }
                                                /*
                                                 * Se a família pratica economia tradicional
                                                 * (agricultura familiar, criação de pequenos animais,
                                                 * extrativismo vegetal, pesca, caça), ela recebe mais 20%;
                                                 */
                                                if (!empty($row->economia_trad)) {
                                                    $extra += 0.20;
                                                }
                                                /*
                                                 * Se a família tem mais de 5 pessoas (6 em diante),
                                                 * a pessoa recebe mais 15%;
                                                 */
                                                if ($row->num_pessoas > 5) {
                                                    $extra += 0.15;
                                                }
                                                if ($row->associadoAcorjuve != 'sim') {
                                                    $extra = 0.00;
                                                    $obs[] = "A pessoa não é associada ACORJUVE";
                                                }
                                                if ($row->associadoAcorjuve != 'sim') {
                                                    $extra = 0.00;
                                                    $obs[] = "A pessoa não é associada ACORJUVE";
                                                }
                                                if ($row->comerciante == 'sim') {
                                                    $extra = 0.00;
                                                    $obs[] = "A pessoa é comerciante";
                                                }
                                            ?>

                                                <tr>
                                                    <td><label><input type="radio"  id="pessoa_<?php echo $familia; ?>" name="familias[<?php echo $familia; ?>]" value="<?php echo $row->codPessoa; ?>"> <?php echo utf8_decode($row->nomeDaPessoa); ?></label></td>
                                                    <td>
                                                        Reuniões Comunidade: <?php echo $row->participaReunioesComunidade; ?><br />
                                                        Reuniões STTR?: <?php echo $row->participaReunioesSTTR; ?><br />
                                                        Reuniões Acorjuve: <?php echo $row->participaReunioesAcorjuve; ?><br />
                                                        Ações do movimento: <?php echo $row->participaAcoesDoMovimento; ?><br />
                                                        Associado Acorjuve: <?php echo $row->associadoAcorjuve; ?><br />
                                                    </td>
                                                    <td><?php echo $row->economia_trad; ?></td>
                                                    <td><?php echo $row->comerciante; ?></td>
                                                </tr>
                                            <?
                                                $extra_final = ($extra_final < $extra) ? $extra : $extra_final;
                                                $pessoas_num = $row->num_pessoas;
                                            }
                                            ?>
                                        </table>
                                    </td>
                                    <td><?php echo $pessoas_num; ?></td>
                                    <td><input name="perc[<?php echo $familia; ?>]" type="text" value="<?php echo $extra_final * 100; ?>" maxlength="3" size="3" class="textfield m-int"/>%</td>

                                </tr>
                                <? } ?>
                                        <tr>
                                            <td colspan="4"><input type="submit" value="GERAR" /></td>
                                        </tr>
                                    </table>


                                </div>
                            </form>
                            <script>
                                var   familias = <?php echo json_encode($jsFamilias); ?>;
                        function validaForm(){
                            if($("#montante")[0].value.length == 0){
                                alert("Digite o montante disponível para a distribuição");
                                return false;
                            }
                            for(i=0;i<familias.length;i++){
                                if($("#pessoa_"+familias[i]+":checked").length == 0){
                                    alert("Selecione uma pessoa de cada família");
                                    return false;
                                }
                            }

                            return true;
                        }
                    </script>

                </div>

                <div id="rodape"><h6>Acorjuve</h6></div>

            </div>
        </div>

    </body>
</html>
