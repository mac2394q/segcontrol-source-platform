<?php
echo "<strong>Nombre del Archivo:</strong>" . $_FILES["archivo-a-subir"]["name"] . "<br/>";
echo "<strong>Archivo de tipo:</strong>" . $_FILES["archivo-a-subir"]["type"] . "<br/>";
echo "<strong>Peso del Archivo:</strong>" . $_FILES["archivo-a-subir"]["size"] . "<br/>";
if ((($_FILES["archivo-a-subir"]["type"] == "image/gif")
  || ($_FILES["archivo-a-subir"]["type"] == "image/jpeg")
  || ($_FILES["archivo-a-subir"]["type"] == "image/jpg"))
  && ($_FILES["archivo-a-subir"]["size"] < 25000))
{
	 $target_path = "subidas/"; 
	 $target_path = $target_path . basename( $_FILES['archivo-a-subir']['name']); 
	 if(move_uploaded_file($_FILES['archivo-a-subir']['tmp_name'], $target_path)) 
	 { 
	  echo "<center><span style='color:#00FF00;font-weight:bold;'>El archivo ". basename( $_FILES['archivo-a-subir']['name'])." ha sido subido exitosamente!</span></center>"; 
	 } 
	 else
	 { 
	  echo "<center><span style='color:#FF0000;font-weight:bold;'>Hubo un error al subir tu archivo! Por favor intenta de nuevo.</span></center>"; 
	 }
}
else
{
 echo "<center><span style='color:#FF0000;font-weight:bold;'>Archivo Invalido!!, comprueba las restricciones.</span></center>";
}
?>