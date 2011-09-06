<?php require_once "verifica.php"; ?>


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
	<div id="imgcabecalho"> <div id="logout"><a href= "
    .php">Desconectar</a></div><div id="data"><?php include "data.php"; ?></div></div>
	
	<div id="area">
	<div id="lateral">
		<h3>Menu Inicial</h3>
		<div id="menu">		
			<?php include "menu.php"; ?>
		</div>
	</div>

	<div id="formulario">
            <?php include('msg.php');?>
	<form action="recebeUsuario.php" method="POST">
      		<div class="form_item">
  		<div class="heading">
    			<h2>Cadastro de Usuários - Sistema Acorjuve</h2>
  		</div>
  		<div class="cfclear">&nbsp;</div>
		</div>

		<!--Campo Usuário-->
		<div class="form_item">
  		<div class="form_textbox">
    			<label class="label" style="width: 150px;">Usuário:</label>
    			<input class="input_text" style="width: 300px;" maxlength="150" size="30" title="" id="text_1" name="nomeUsuario" type="text" />
  		</div>
  		<div class="cfclear">&nbsp;</div>
		</div>

		<!--Campo Senha-->
		<div class="form_item">
  		<div class="form_textbox">
    			<label class="label" style="width: 150px;">Senha:</label>
    			<input class="input_num" style="width: 300px;" maxlength="150" size="30" title="" id="text_5" name="senhaUsuario" type="password" />
  		</div>
		<div class="cfclear">&nbsp;</div>
		</div>

		<!--Campo E-mail-->
		<div class="form_item">
  		<div class="form_textbox">
    				<label class="label" style="width: 150px;">E-mail:</label>
            <input class="input_num" style="width:300px;" maxlength="150" size="30" title="" id="text_3" name="emailUsuario" type="text" />
  		</div>
  		<div class="cfclear">&nbsp;</div>
		</div>

		
		<!--Botao Enviar-->		
		<div id="bt_enviar">
  			<div class="form_element cf_button">
    			<input value="Enviar" type="submit" style="width: 100px;"/>
			</div>
  		</div>

		<!--Botao Limpar-->		
		<div id="bt_limpar">
  			<div class="form_element cf_button">
    			<input value="Limpar" type="reset" style="width: 100px;"/>
			</div>
  		</div>
</form>
	  <div class="cfclear">&nbsp;</div>
  		<div class="cfclear">&nbsp;</div>
  		<div class="cfclear">&nbsp;</div>

</div>
</div>
<div id="rodape"><h6>Acorjuve</h6></div>
</div>


</body>
</html>
