<?php 
	/*
	 * Permite enviar y/o subir múltiples archivos, usando PHP, javascript y PHP Mailer para  el envío de mails
	 * Autor: Alexander Concha Abarca <alex[@]buayacorp.com>
	 * http://www.buayacorp.com/
	 * 
	 * Este script está bajo licencia de Creative Commons 
	 * http://creativecommons.org/licenses/by/2.0/
	 */
	// Para el envío de mails
	include_once('class.phpmailer.php');
	// Indica si los datos provienen del formulario
	$postback = isset($_POST['postback']) ? true : false;
	
	if ($postback) {
		extract($_POST);
		$mail = new phpmailer (); # Crea una instancia
		$mail -> From = $from;
		$mail -> FromName = "BuayaCorp"; # Puede obtenerse del formulario, por facilidad se hace de esta manera
		$mail -> AddAddress ($to);
		$mail -> Subject = $sbj;
		$mail -> Body = $msg;
		$mail -> IsHTML (true);
		$archivos = '';
		$msg = "Mensaje Enviado";
		
	   	if (isset ($_FILES["archivos"])) { # Si es que se subió algún archivo
			$msg .= "<ul>";
			foreach ($_FILES["archivos"]["error"] as $key => $error) { # Iterar sobre la colección de archivos
				if ($error == UPLOAD_ERR_OK) { // Si no hay error
					$tmp_name = $_FILES["archivos"]["tmp_name"][$key];
					$name = $_FILES["archivos"]["name"][$key];
					$msg .= "<li>$name</li>";
					$name = uniqid('bc') . '_' . $name; # Generar un nombre único para el archivo
					$mail -> AddAttachment ($tmp_name, $name); # Añade el archivo adjunto
					/*
					Si se van a guardar los archivos en un directorio, deberían descomentarse
					las siguientes líneas, si se van a guardar los nombres 
					de los archivos en una base de datos, aquí debería realizarse algo...					
				   	
					move_uploaded_file($tmp_name, "ruta/directorio/$name"); # Guardar el archivo en una ubicación, debe tener los permisos necesarios
					*/
				} #if
	   		} # foreach
			$msg .= '</ul>';
		} # if
		if (!$mail -> Send ()){
			$msg = "No se pudo enviar el email";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Multiple Upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
body {
	font: small "Trebuchet MS";
}
#disclaimer {
	background-color: #fafafa;
	padding: 1em;
	border: 3px double #ccc;
}
/*************************/
/* Necesario para que se muestre bien los nuevos elementos agregados */
.file {
	display: block;
}
span a {
	margin-left: 1em;
}
/*************************/
input, textarea {
	border:3px double #ccc;
	background-color:#fafafa;
}
</style>
<script type="text/javascript">
var numero = 0;

// Funciones comunes
c= function (tag) { // Crea un elemento
   return document.createElement(tag);
}
d = function (id) { // Retorna un elemento en base al id
   return document.getElementById(id);
}
e = function (evt) { // Retorna el evento
   return (!evt) ? event : evt;
}
f = function (evt) { // Retorna el objeto que genera el evento
   return evt.srcElement ?  evt.srcElement : evt.target;
}

addField = function () {
   container = d('files');
   
   span = c('SPAN');
   span.className = 'file';
   span.id = 'file' + (++numero);

   field = c('INPUT');   
   field.name = 'archivos[]';
   field.type = 'file';
   
   a = c('A');
   a.name = span.id;
   a.href = '#';
   a.onclick = removeField;
   a.innerHTML = 'Quitar';

   span.appendChild(field);
   span.appendChild(a);
   container.appendChild(span);
}
removeField = function (evt) {
   lnk = f(e(evt));
   span = d(lnk.name);
   span.parentNode.removeChild(span);
}
</script>
</head>

<body>
	<div id="disclaimer">
	<p>Por favor, <strong>NO</strong> subir archivos grandes ni <strong>virus</strong>, este formulario es simplemente una prueba de concepto.</p>
	<p><a href="http://www.buayacorp.com" title="Programaci&oacute;n y Dise&ntilde;o">BuayaCorp</a>, 	
   <strong>NO</strong> se responsabiliza por el uso de &eacute;ste formulario</p>
   </div>
   <?php if (isset($msg)) echo $msg;?>
	<form name="frm" id="frm" action="" method="post" enctype="multipart/form-data">
	<dl>
		<dt><label for="to" accesskey="1">Para</label></dt>
		<dd><input type="text" name="to" id="to" size="60" /></dd>
		
		<dt><label for="from" accesskey="2">De</label></dt>
		<dd><input type="text" name="from" id="from" size="60" /></dd>
		
		<dt><label for="sbj" accesskey="3">Asunto</label></dt>
		<dd><input type="text" name="sbj" id="sbj" size="60" /></dd>
		
		<dt><label for="msg" accesskey="4">Mensaje</label></dt>
		<dd><textarea id="msg" name="msg" rows="7" cols="45"></textarea></dd>
		
		<dt><label>Archivos Adjuntos:</label>&nbsp;&nbsp;&nbsp;<a href="#" onclick="addField()" accesskey="5">A&ntilde;adir Archivo</a></dt>
		<dd><div id="files"></div></dd>
		<dd><input type="submit" value="Enviar" id="postback" name="postback" accesskey="6" /></dd>
   </dl>
   </form>
</body>
</html>