<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>Relatórios - ACORJUVE</title>
        <meta name="GENERATOR" content="Quanta Plus" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../acorjuve.css">
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
                <h3>Dados Brutos</h3>
                <?
                        foreach ($countFields as $label => $field) {
                            $fn = !empty($field[2])?$field[2]:'countByField';
                            if (isset($field[3]) AND !empty($field[3])) {
                                $this->db->where($field[3]);
                                $rs = $this->dbpessoa->$fn($field[1]);
                                $totalP = $this->dbpessoa->countAll($field[3]);
                            } else {
                                $rs = $this->dbpessoa->$fn($field[1]);
                            }
                ?>
                            <div id="formulario">

                                <!-- ####################################-->
                                <table border="1" cellpadding="2" cellspacing="0">
                                    <tr>
                                        <td colspan="4" class="rel_title"><?= $label; ?></td>
                                    </tr>
                                    <tr class="col_header">
                                        <td class="col_header"><?= $field[0]; ?></td>
                                        <td class="col_header">Quant</td>
                                        <td class="col_header">Total</td>
                                        <td class="col_header">%</td>
                                    </tr>
                        <? foreach ($rs->result() as $key => $value) {
                        ?>
                                <tr>
                                    <td><?= ucfirst($value->field); ?></td>
                                    <td><?= $value->num; ?></td>
                                    <td><?= $totalP; ?></td>
                                    <td><?= number_format((!empty($value->num)) ? ($value->num / $totalP * 100): '0',2,',', '.'); ?>%</td>
                                </tr>
                        <? } ?>
                        </table>
                        <!-- ####################################-->

                    </div>
                <?
                            if (isset($field[2])) {
                                $totalP = $this->dbpessoa->countAll();
                            }
                        }//fim foreach ?>




                <? #FAMILIAS###############$$$$$$$$$$$$$$$$%%%%%%%%%%%%%%%%%#####################
                        foreach ($countFieldsFamilias as $label => $field) {
                            $fn = !empty($field[2])?$field[2]:'countByField';
                            if (isset($field[3]) AND !empty($field[3])) {
                                $this->db->where($field[3]);
                                $rs = $this->dbpessoa->$fn($field[1]);
                                $totalF = $this->dbpessoa->countAllFamilias($field[3]);
                            } else {
                                $rs = $this->dbpessoa->$fn($field[1]);
                            }
                ?>
                            <div id="formulario">

                                <!-- ####################################-->
                                <table border="1" cellpadding="2" cellspacing="0">
                                    <tr>
                                        <td colspan="4" class="rel_title"><?= $label; ?></td>
                                    </tr>
                                    <tr class="col_header">
                                        <td class="col_header"><?= $field[0]; ?></td>
                                        <td class="col_header">Quant</td>
                                        <td class="col_header">Total</td>
                                        <td class="col_header">%</td>
                                    </tr>
                        <? foreach ($rs->result() as $key => $value) {
                        ?>
                                <tr>
                                    <td><?= ucfirst($value->field); ?></td>
                                    <td><?= $value->num; ?></td>
                                    <td><?= $totalF; ?></td>
                                    <td><?= number_format((!empty($value->num)) ? ($value->num / $totalF * 100): '0',2,',', '.'); ?>%</td>
                                </tr>
                        <? } ?>
                        </table>
                        <!-- ####################################-->

                    </div>
                <?
                            if (isset($field[2])) {
                                $totalP = $this->dbpessoa->countAll();
                            }
                        }//fim foreach ?>



                             <div id="rodape"><h6>Acorjuve</h6></div>

            </div>
        </div>

    </body>
</html>
