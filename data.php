<?php

$meses = array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
$dia = date("d", time());
$mes = date ("m", time());
$ano = date ("y", time());
echo "Santarém-PA, " . $dia . " de " . $meses [$mes -1] . " de 20" . $ano;

?>
