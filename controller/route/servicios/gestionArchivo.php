<?php

$nombre1 = $_FILES["archivo1"]["name"];
$nombre1 = $_FILES["archivo2"]["name"];

$temp_archivo = $_FILES["archivo1"]["tmp_name"];
$directorio=$_SERVER['DOCUMENT_ROOT'] ."/archivos";

$result1=move_uploaded_file($temp_archivo,$directorio . "/" . "carro1.png");
$temp_archivo = $_FILES["archivo2"]["tmp_name"];
$result2=move_uploaded_file($temp_archivo,$directorio . "/" . "carro2.png");
if ($result1 && $result2)
    		{
 			echo "Las fotos se publicaron correctamente";
			}





//$nombre_tmp = $_FILES["ar$chivo2"]["tmp_name"][$clave];
	//var_dump ($_FILES);
?>
