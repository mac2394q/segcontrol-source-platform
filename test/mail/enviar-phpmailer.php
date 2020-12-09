<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
include_once("class.phpmailer.php");
include_once("class.smtp.php");


$de ="hernan@grupoipx.com";
$para ="hhgomez@unipacifico.edu.co";
$asunto ="Reporte de Minuta";
/*$_POST["mensaje_txt"] $_POST["asunto_txt"  $_POST["para_txt"] $_POST["de_txt"]*/

$mensaje = "Reporte de Minuta";
$cabeceras = "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
$cabeceras .= "From: $de \r\n";

 //$archivo = $_FILES["archivo_fls"]["tmp_name"];
 //$destino = $_FILES["archivo_fls"]["name"];
 $destino=$_SERVER['DOCUMENT_ROOT'] .RECURSOS_PATH.$idservicio.'/reporte.pdf';;
 $mail = new PHPMailer();

//if(move_uploaded_file($archivo,$destino)){
	if($mail->AddAttachment($destino)){
	//incluyo la clase phpmailer


	//$mail = new PHPMailer(); //creo un objeto de tipo PHPMailer
	$mail->IsSMTP(); //protocolo SMTP
	$mail->SMTPAuth = true;//autenticaci�n en el SMTP
	$mail->SMTPSecure = "ssl";//SSL security socket layer
	$mail->Host = "p3plcpnl0781.prod.phx3.secureserver.net";//servidor de SMTP de gmail

	$mail->Port = 465;//puerto seguro del servidor SMTP de gmail
	$mail->setFrom($de); //Remitente del correo
	$mail->AddAddress($para);// Destinatario
	$mail->Username = "hernan@grupoipx.com";//Aqui pon tu correo de gmail
	$mail->Password = "hernan123";//Aqui pon tu contrase�a de gmail
	$mail->Subject = $asunto; //Asunto del correo
	$mail->Body = $mensaje; //Contenido del correo
	$mail->WordWrap = 50; //No. de columnas
	$mail->MsgHTML($mensaje);//Se indica que el cuerpo del correo tendr� formato html
	//$mail->AddAttachment($destino); //accedemos al archivo que se subio al servidor y lo adjuntamos

	if($mail->Send()){ //enviamos el correo por PHPMailer
		$respuesta = "fdf";
	} else{
		$respuesta = "El mensaje no se pudo enviar con la clase PHPMailer y tu cuenta de gmail =(";
	   	$respuesta .= " Error: ".$mail->ErrorInfo;
	}
} else {
 	$respuesta = "Ocurrio un error al subir el archivo adjunto =(";
}



?>
