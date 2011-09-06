<option value="0">-- Selecione --</option>

<?php
	include("conectamysql.php");
	$requisicao = mysql_query("SELECT codQualFuncaoPublica, qualFuncaoPublica FROM funcaoPublicaQual order by codQualFuncaoPublica") or die(mysql_error());
	while($rs = mysql_fetch_assoc($requisicao))
	{
?>
<option value="<? echo ($rs['codQualFuncaoPublica']);?>">
<? echo $rs["qualFuncaoPublica"];?>
</option>
<? }?>
