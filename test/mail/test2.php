<?php


$destinatario="mac2394q@gmail.com";
 $remitente = "mac2394q@gmail.com";
   $asunto = "vencimiento de Certificados SAFE LTDA";


    $headers = "MIME-Version: 1.0\r\n";
    $headers.="Content-type: text/html; charset=iso-8859-1\r\n";
    $headers.="From: safe ltda <mac2394q@gmail.com>\r\n";
    $headers .= "Cc: mac2394q@gmail.com\r\n";

    mail($destinatario,$asunto,"hola",$headers);



?>
