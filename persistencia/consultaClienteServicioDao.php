<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."utilidades/generarPDF.php");
require_once(MODEL_PATH."servicios.php");
require_once(CONTROLLER_PATH."minutaController.php");
require_once(MODEL_PATH."minuta.php");
require_once(PERSISTENCIA_PATH."minutaDao.php");
require_once (PERSISTENCIA_PATH."DataSource.php");

class consultaClienteServicioDao{

public  function servicioMinuta($id){


  $controller_servicio = new serviciosController();
  $objServicio=$controller_servicio->serviciosPorId($id);
  
  $data_source = new DataSource();
  $data_table = $data_source->ejecutarConsulta(
    "SELECT  nov.idservicio_novedad, nov.fecha_novedad, nov.evento, nov.observacion, nov.nota
        FROM servicio join servicio_novedad as nov
                          on(servicio.id_servicio=nov.id_servicio)
        where servicio.estado ='ACTIVO'
             and servicio.id_servicio=" .$objServicio->getId_servicio()
             ." order by nov.idservicio_novedad DESC");

  $servicio = $data_source->ejecutarConsulta(
    "SELECT servicio.id_servicio, servicio.ruta, servicio.numero_contenedor, servicio.manifiesto,
    cliente.razon_social, cliente.nombre_contacto,
 cliente.celular1, conductor.nombre_conductor, conductor.cedula, conductor.telefono1,
 vehiculo.placa, vehiculo.marca, vehiculo.color
 FROM servicio  join cliente
 on(cliente.id_cliente=servicio.id_cliente) join conductor  
 on(conductor.id_conductor=servicio.id_conductor) join vehiculo 
 on(vehiculo.id_vehiculo=servicio.id_vehiculo)
 where servicio.estado ='ACTIVO'
 and servicio.id_servicio=".$objServicio->getId_servicio());
  $generador=new GeneradorArchivo();
  $generador->procesar($servicio,$data_table);
 
  return $servicio[0]['placa']; 

 }

}
?>
