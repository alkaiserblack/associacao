<option value="0">
--  Selecione  --
</option>
<?php
	include("conectamysql.php");
	$requisicao = mysql_query("SELECT codNomeFonteDeRenda, nomeFonteDeRenda FROM nomeFonteDeRenda order by codNomeFonteDeRenda") or die(mysql_error());
	while($rs = mysql_fetch_assoc($requisicao))
	{
?>
<option value="<? echo ($rs['codNomeFonteDeRenda']);?>">
<? echo $rs["nomeFonteDeRenda"];?>
</option>
<? }?>
