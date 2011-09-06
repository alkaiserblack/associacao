<?php
	include("conectamysql.php");
	$requisicao = mysql_query("SELECT codEscolaridade, escolaridade FROM escolaridade order by codEscolaridade") or die(mysql_error());
	while($rs = mysql_fetch_assoc($requisicao))
	{
?>
<option value="<? echo ($rs['codEscolaridade']);?>">
<? echo utf8_encode($rs["escolaridade"]);?>
</option>
<? }?>
