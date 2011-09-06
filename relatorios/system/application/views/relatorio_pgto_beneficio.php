<?

function insereMascara($tipo, $valor) {
    switch ($tipo) {
        case 'cpf':
            $sub1 = substr($valor, 0, 3);
            $sub2 = substr($valor, 3, 3);
            $sub3 = substr($valor, 6, 3);
            $sub4 = substr($valor, 9, 2);
            return $sub1 . '.' . $sub2 . '.' . $sub3 . '-' . $sub4;
            break;
        case 'cnpj':
            $sub1 = substr($valor, 0, 2);
            $sub2 = substr($valor, 2, 3);
            $sub3 = substr($valor, 5, 3);
            $sub4 = substr($valor, 8, 4);
            $sub5 = substr($valor, 12, 2);
            return $sub1 . '.' . $sub2 . '.' . $sub3 . '/' . $sub4 . '-' . $sub5;
            break;
        case 'tel':
            $sub1 = substr($valor, 0, 4);
            $sub2 = substr($valor, 4, 4);
            return $sub1 . '-' . $sub2;
            break;
        case 'telddd':
            $sub1 = substr($valor, 0, 2);
            $sub2 = substr($valor, 2, 4);
            $sub3 = substr($valor, 6, 4);
            return '(' . $sub1 . ')' . $sub2 . '-' . $sub3;
            break;
        case 'cep':
            $sub1 = substr($valor, 0, 2);
            $sub2 = substr($valor, 2, 3);
            $sub3 = substr($valor, 5, 3);
            return $sub1 . '.' . $sub2 . '-' . $sub3;
            break;
    }
}
?>
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
                    <div class="datagrid">
                        <table>
                            <tr>
                                <td colspan="4">
                                    <table>
                                        <tr>
                                            <td><b>Montante declarado: R$ <?php echo number_format($montante_declarado, 2, ",", "."); ?></b></td>
                                            <td><b>Base de cálculo R$ <?php echo number_format($bc, 2, ",", "."); ?></b></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>% Extra</th>
                                <th>Valor à receber</th>
                            </tr>
                            <?
                            $total = 0;
                            foreach ($valor_familias as $idPessoa => $valor) {
                                $pessoa = $this->dbpessoa->getPessoa($idPessoa);
                            ?>

                                <tr>
                                    <td><?php echo insereMascara('cpf',str_replace("-", "", str_replace(".", "", $pessoa->cpf))); ?></td>
                                    <td><?php echo utf8_decode($pessoa->nomeDaPessoa); ?></td>
                                    <td><?php echo $valor[2];?>%</td>
                                    <td>&nbsp; R$ <?php echo number_format($valor[0], 2, ",", "."); ?></td>
                                </tr>
                            <?
                                $total += $valor[0];
                            }
                            ?>
                            <tr>
                                <td colspan="3"><div style="float:right; font-weight: bold">Total: &nbsp;&nbsp;</div></td>
                                <td><b>&nbsp; R$ <?php echo number_format($total,2,",",".");?></b></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div style="font-weight: bold">OBS.: <br />
                                        É possível que haja uma diferença de alguns pouquíssimos centavos entre o montante inserido e o total exibido. Isso é normal pois é em decorrência de arrendodamentos de valores decimais.
                                    </div>
                                </td>

                            </tr>
                        </table>

                    </div>

                </div>

                <div id="rodape"><h6>Acorjuve</h6></div>

            </div>
        </div>

    </body>
</html>
