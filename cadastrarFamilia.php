<?php include "verifica.php"; ?>

<?php
$_SESSION['cadFormulario0'] = array();
	if(getenv("REQUEST_METHOD") == "POST"){
		foreach($_POST as $chave0 => $valor0)
		{
			$_SESSION['cadFormulario0'][$chave0] = $valor0;
		}
		header("Location: cadastrarEntrevista.php");
	}
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
	<div id="imgcabecalho"> <div id="logout"><a href= "logout.php">Desconectar</a></div><div id="data"><?php include "data.php"; ?></div></div>
	
	<div id="area">
	<div id="lateral">
		<h3>Menu Inicial</h3>
		<div id="menu">		
			<?php include "menu.php"; ?>
		</div>
	</div>

	<div id="formulario">
	<form action="" method="POST">
      		<div class="form_item">
  		<div class="heading">
    			<h2>Cadastro Acorjuve - Etapa 1 de X</h2>
  		</div>
  		<div class="cfclear">&nbsp;</div>
		</div>

		<fieldset>
		<legend><label class="label"><b>  FAMÍLIA  </b></label></legend>
		<div class="cfclear">&nbsp;</div>
		<div class="cfclear">&nbsp;</div>

		<!--Campo Usuário-->
		<div class="form_item">
  		<div class="form_textbox">
    			<label class="label" style="width: 150px;">Família:</label>
    			<input class="input_text" style="width: 300px;" maxlength="150" size="30" name="familia[codFamilia]" type="text" />
  		</div>
  		<div class="cfclear">&nbsp;</div>
		</div>

		</fieldset>

		<div class="cfclear">&nbsp;</div>
		<div class="cfclear">&nbsp;</div>
		
		<!--Botão Prosseguir-->
		<div id="bt_enviar">
  			<div class="form_element cf_button">
    			<input type="submit" value="Prosseguir >>" style="width: 110px;">
			</div>
  		</div>

</form>
</div>
</div>

<br>
<br>
<br>

<div id="rodape"><h6>Acorjuve</h6></div>

</div>

</body>
</html>
