<?php
	include("conectamysql.php");
	$requisicao = mysql_query("SELECT codComunidade, nomeComunidade FROM comunidade order by codComunidade") or die(mysql_error());
	while($rs = mysql_fetch_assoc($requisicao))
	{
?>
<option value="<? echo ($rs['codComunidade']);?>">
<? echo $rs["nomeComunidade"];?>
</option> 
<? }?>
