<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
<title></title>
<meta name="generator" content="Bluefish 1.0.7"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="acorjuve.css">	
</head>

<body>
<div id="geral">

	<div id="cabecalho"></div>
	<div id="imgcabecalho"> <div id="logout"></div><div id="data"><?php include "data.php"; ?></div></div>
	
	<div id="area">
	<div id="msg"><?php $_SESSION['msg'];?></div>
	<div id="formulario">
	<h2 style="text-align:left; margin-left:200px;">Faça o seu Login!</h2>

	<form action="login.php" method="POST">
 
		<!--Campo Usuário-->
		<div class="form_item">
  		<div class="form_textbox">
    			<label class="label" style="width: 100px;">Usuário:</label>
    			<input class="input_text" style="width: 250px;" maxlength="150" size="30" name="nome" type="text" />
  		</div>
  		<div class="cfclear">&nbsp;</div>
		</div>

		<!--Campo Senha-->
		<div class="form_item">
  		<div class="form_textbox">
    			<label class="label" style="width: 100px;">Senha:</label>
    			<input class="input_num" style="width: 250px;" maxlength="150" size="30" name="senha" type="password" />
  		</div>
		<div class="cfclear">&nbsp;</div>
		</div>

		<!--Botao Enviar-->		
		<div id="bt_enviar">
  			<div class="form_element cf_button">
    			<input value="Login" name="bt_enviar" type="submit" style="width: 100px;"/>
  			</div>
		</div>

	</form>
	</div>

</div>

<div id="rodape"><h6>Acorjuve</h6></div>

</div>
</body>
</html>
