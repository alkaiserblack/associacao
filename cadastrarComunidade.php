<?php include "verifica.php"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title></title>
<meta name="generator" content="Bluefish 1.0.7"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="acorjuve.css">	
</head>

<body>
<div id="tudo">
<div id="geral">

	<div id="cabecalho"></div>
	<div id="imgcabecalho"> <div id="logout"><a href= "logout.php">Desconectar</a></div><div id="data"><?php include "data.php"; ?></div></div>
	
	<div id="area">
	<div id="lateral">
		<h3>Menu Inicial</h3>
		<div id="menu">		
			<?php include "menu.php"; ?>
		</div>
	</div>

	<div id="formulario">
            <? include ("msg.php"); ?>
	<form action="recebeComunidade.php" method="POST">

      		<div class="form_item">
  			<div class="heading">
    				<h2>Cadastro de comunidades - Sistema Acorjuve</h2>
  			</div>
  			<div class="cfclear">&nbsp;</div>
		</div>
		<div class="cfclear">&nbsp;</div>
		<div class="form_item">
  			<div class="form_textbox">
    				<label class="label" style="width: 150px;">Comunidade:</label>
    				<input class="input_text" style="width: 300px; maxlength="150" size="30" title="" id="text_1" name="comunidade[nomeComunidade]" 		type="text" />
  		</div>
  		<div class="cfclear">&nbsp;</div>
		</div>

		</br>
		<!--Botao Enviar-->		
		<div id="bt_enviar">
  			<div class="form_element cf_button">
    			<input value="Enviar" name="button_28" type="submit" style="width: 100px;"/>
			</div>
  		</div>
		<div class="cfclear">&nbsp;</div>
		<div class="cfclear">&nbsp;</div>
		<div class="cfclear">&nbsp;</div>

	</form>
	</div>
</div>

<br>
<br>
<br>
<br>
<br>

<div id="rodape"><h6>Acorjuve
</h6></div>
</body>
</html>
