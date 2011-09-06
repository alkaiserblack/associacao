	
<?php
	include("conectamysql.php");
	$requisicao = mysql_query("SELECT codEntrevistador, entrevistador FROM entrevistador order by codEntrevistador") or die(mysql_error());
	while($rs = mysql_fetch_assoc($requisicao))
	{
?>
<option value="<? echo ($rs['codEntrevistador']);?>">
<? echo $rs["entrevistador"];?>
</option>
<? }?>
