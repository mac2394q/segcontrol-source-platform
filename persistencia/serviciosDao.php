<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once (PERSISTENCIA_PATH."DataSource.php");
require_once (MODEL_PATH."servicios.php");
require_once (MODEL_PATH."minuta.php");
require_once (MODEL_PATH."conductor.php");
require_once (MODEL_PATH."vehiculo.php");
class serviciosDao{


  public function verificarMinuta($id){
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT servicio_novedad.idservicio_novedad as minuta, servicio_novedad.fecha_novedad
       FROM servicio join servicio_novedad on(servicio.id_servicio=servicio_novedad.id_servicio)
       where servicio.estado ='ACTIVO' and servicio.id_servicio= $id order by servicio_novedad.idservicio_novedad DESC");

    $objServicios = null;
    date_default_timezone_set('america/bogota');
    $fecha = new DateTime();
    $actual =$fecha->getTimestamp();
    $from_time =strtotime($data_table[0]['fecha_novedad']) ;
    $dif =round(($actual -$from_time) / 60,0);
    $var=$dif-60;
      if(intval($var) < -10){
        $resultado=3;
      }else{
        if(intval($var) < 0){
           $resultado=2;
         }else {
          $resultado=1;
        }
      }
      return $resultado;
    }

  public function verificarMinutavencidos(){
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("select * from servicio_novedad where idservicio_novedad in (SELECT max(servicio_novedad.idservicio_novedad) as minuta
FROM servicio join servicio_novedad on(servicio.id_servicio=servicio_novedad.id_servicio)
where servicio.estado ='ACTIVO' group by servicio.id_servicio
order by minuta desc) order by fecha_novedad desc");

    $objServicios = null;
    $arrayServicios = array();

    date_default_timezone_set('america/bogota');

    if(count($data_table) >0){
      foreach ($data_table as $clave => $valor) {
        $fecha = new DateTime();
        $actual =$fecha->getTimestamp();
        $from_time =strtotime($data_table[$clave]['fecha_novedad']) ;
        $dif =round(($actual -$from_time) / 60,0);
        $var=$dif-60;
          if(intval($var) > 0 ){
            $objMinuta = new minuta(
            $data_table[$clave]["idservicio_novedad"],
            $data_table[$clave]["id_servicio"],
            $data_table[$clave]["id_empleado"],
            $data_table[$clave]["fecha_novedad"],
            $data_table[$clave]["evento"],
            $data_table[$clave]["observacion"],
            $data_table[$clave]["nota"]);
            array_push($arrayServicios, $objMinuta);
          }
         }
      return $arrayServicios;
    }else{
      return null;
    }

  }

  public function nMinutavencidos(){
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("select * from servicio_novedad where idservicio_novedad in (SELECT max(servicio_novedad.idservicio_novedad) as minuta FROM servicio join servicio_novedad on(servicio.id_servicio=servicio_novedad.id_servicio) where servicio.estado ='ACTIVO' group by servicio.id_servicio order by minuta desc) order by fecha_novedad desc");
    date_default_timezone_set('america/bogota');
    if(count($data_table) >0){
      $c = 0;
      foreach ($data_table as $clave => $valor) {
        $fecha = new DateTime();
        $actual =$fecha->getTimestamp();
        $from_time =strtotime($data_table[$clave]['fecha_novedad']) ;
        $dif =round(($actual -$from_time) / 60,0);
        $var=$dif-60;
          if(intval($var) > 0 ){   $c = intval($c)+1;  }
       }
    }
     return $c;
  }

  public function verificarMinutaPronto(){
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("select * from servicio_novedad where idservicio_novedad in (SELECT max(servicio_novedad.idservicio_novedad) as minuta
FROM servicio join servicio_novedad on(servicio.id_servicio=servicio_novedad.id_servicio)
where servicio.estado ='ACTIVO' group by servicio.id_servicio
order by minuta desc) order by fecha_novedad desc");

    $objServicios = null;
    $arrayServicios = array();

    date_default_timezone_set('america/bogota');

    if(count($data_table) >0){
      foreach ($data_table as $clave => $valor) {
        $fecha = new DateTime();
        $actual =$fecha->getTimestamp();
        $from_time =strtotime($data_table[$clave]['fecha_novedad']) ;
        $dif =round(($actual -$from_time) / 60,0);
        $var=$dif-60;
          if(intval($var)>-10 && intval($var) < 0 ){
            $objMinuta = new minuta(
            $data_table[$clave]["idservicio_novedad"],
            $data_table[$clave]["id_servicio"],
            $data_table[$clave]["id_empleado"],
            $data_table[$clave]["fecha_novedad"],
            $data_table[$clave]["evento"],
            $data_table[$clave]["observacion"],
            $data_table[$clave]["nota"]);
            array_push($arrayServicios, $objMinuta);
          }
         }
      return $arrayServicios;
    }else{
      return null;
    }

  }

  public function nMinutaPronto(){
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("select * from servicio_novedad where idservicio_novedad in (SELECT max(servicio_novedad.idservicio_novedad) as minuta
FROM servicio join servicio_novedad on(servicio.id_servicio=servicio_novedad.id_servicio)
where servicio.estado ='ACTIVO' group by servicio.id_servicio
order by minuta desc) order by fecha_novedad desc");
    date_default_timezone_set('america/bogota');
    if(count($data_table) >0){

      $c = 0;
      foreach ($data_table as $clave => $valor) {
        $fecha = new DateTime();
        $actual =$fecha->getTimestamp();
        $from_time =strtotime($data_table[$clave]['fecha_novedad']) ;
        $dif =round(($actual -$from_time) / 60,0);
        $var=$dif-60;
          if(intval($var)>-10 && intval($var) < 0){   $c = intval($c)+1;  }
       }
    }
     return $c;
  }

  public function verificarMinutaTiempo(){
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("select * from servicio_novedad where idservicio_novedad in (SELECT max(servicio_novedad.idservicio_novedad) as minuta
FROM servicio join servicio_novedad on(servicio.id_servicio=servicio_novedad.id_servicio)
where servicio.estado ='ACTIVO' group by servicio.id_servicio
order by minuta desc) order by fecha_novedad desc");

    $objServicios = null;
    $arrayServicios = array();

    date_default_timezone_set('america/bogota');

    if(count($data_table) >0){
      foreach ($data_table as $clave => $valor) {
        $fecha = new DateTime();
        $actual =$fecha->getTimestamp();
        $from_time =strtotime($data_table[$clave]['fecha_novedad']) ;
        $dif =round(($actual -$from_time) / 60,0);
        $var=$dif-60;
          if(intval($var) < -10 ){
            $objMinuta = new minuta(
            $data_table[$clave]["idservicio_novedad"],
            $data_table[$clave]["id_servicio"],
            $data_table[$clave]["id_empleado"],
            $data_table[$clave]["fecha_novedad"],
            $data_table[$clave]["evento"],
            $data_table[$clave]["observacion"],
            $data_table[$clave]["nota"]);
            array_push($arrayServicios, $objMinuta);
          }
         }
      return $arrayServicios;
    }else{
      return null;
    }

  }

  public function nMinutaTiempo(){
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("select * from servicio_novedad where idservicio_novedad in (SELECT max(servicio_novedad.idservicio_novedad) as minuta
FROM servicio join servicio_novedad on(servicio.id_servicio=servicio_novedad.id_servicio)
where servicio.estado ='ACTIVO' group by servicio.id_servicio
order by minuta desc) order by fecha_novedad desc");
    date_default_timezone_set('america/bogota');
    if(count($data_table) >0){

      $c = 0;
      foreach ($data_table as $clave => $valor) {
        $fecha = new DateTime();
        $actual =$fecha->getTimestamp();
        $from_time =strtotime($data_table[$clave]['fecha_novedad']) ;
        $dif =round(($actual -$from_time) / 60,0);
        $var=$dif-60;
          if(intval($var) < -10 ){   $c = intval($c)+1;  }
       }
    }
     return $c;
  }

  public function ultimoID(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM  `servicio` ORDER BY  id_servicio DESC ");
        return $data_table[0]["id_servicio"];
  }
  public function numeroServiciosActivos(){
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT count(*) as 'n' FROM `servicio` WHERE estado='ACTIVO'");
    if(count($data_table) >= 1){
      $n=$data_table[0]['n'];
      return $n;
    }else{
      return 0;
    }
  }

  public function listaServicios(){
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio` ORDER BY `servicio`.`fecha_creacion` DESC");
    $objServicios = null;
    $arrayServicios = array();
    if(count($data_table) >0){
      foreach ($data_table as $clave => $valor) {
        $objServicios = new servicio(
          $data_table[$clave]["id_servicio"],
          $data_table[$clave]["id_conductor"],
          $data_table[$clave]["id_vehiculo"],
          $data_table[$clave]["id_cliente"],
          $data_table[$clave]["id_empleado"],
          $data_table[$clave]["manifiesto"],
          $data_table[$clave]["fecha_creacion"],
          $data_table[$clave]["fecha_fin"],
          $data_table[$clave]["estado"],
          $data_table[$clave]["satelital"],
          $data_table[$clave]["ciudad_origen"],
          $data_table[$clave]["ciudad_destino"],
          $data_table[$clave]["direccion_descargue"],
          $data_table[$clave]["sello"],
          $data_table[$clave]["numero_contenedor"],
          $data_table[$clave]["link_localizador"],
          $data_table[$clave]["usuario_satelital"],
          $data_table[$clave]["clave_satelital"],
          $data_table[$clave]["ruta"]);
          array_push($arrayServicios, $objServicios);
        }
        return $arrayServicios;
      }else{
        return null;
      }
    }
  /**********************************************************************************/
    public function listaTodosServiciosActivos(){
      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio` where estado ='ACTIVO' order by fecha_creacion desc");
      $objServicios = null;
      $arrayServicios = array();
      if(count($data_table) >0){
        foreach ($data_table as $clave => $valor) {
          $objServicios = new servicio(
            $data_table[$clave]["id_servicio"],
            $data_table[$clave]["id_conductor"],
            $data_table[$clave]["id_vehiculo"],
            $data_table[$clave]["id_cliente"],
            $data_table[$clave]["id_empleado"],
            $data_table[$clave]["manifiesto"],
            $data_table[$clave]["fecha_creacion"],
            $data_table[$clave]["fecha_fin"],
            $data_table[$clave]["estado"],
            $data_table[$clave]["satelital"],
            $data_table[$clave]["ciudad_origen"],
            $data_table[$clave]["ciudad_destino"],
            $data_table[$clave]["direccion_descargue"],
            $data_table[$clave]["sello"],
            $data_table[$clave]["numero_contenedor"],
            $data_table[$clave]["link_localizador"],
            $data_table[$clave]["usuario_satelital"],
            $data_table[$clave]["clave_satelital"],
            $data_table[$clave]["ruta"]);
            array_push($arrayServicios, $objServicios);
          }
          return $arrayServicios;
        }else{
          return null;
        }
      }

      public function listaTodosServiciosActivosCliente($id){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio` JOIN cliente ON (servicio.id_cliente=cliente.id_cliente)
        where estado ='ACTIVO' AND cliente.id_cliente=:id order by fecha_creacion desc",array(
          ':id'=>$id));
        $objServicios = null;
        $arrayServicios = array();
        if(count($data_table) >0){
          foreach ($data_table as $clave => $valor) {
            $objServicios = new servicio(
              $data_table[$clave]["id_servicio"],
              $data_table[$clave]["id_conductor"],
              $data_table[$clave]["id_vehiculo"],
              $data_table[$clave]["id_cliente"],
              $data_table[$clave]["id_empleado"],
              $data_table[$clave]["manifiesto"],
              $data_table[$clave]["fecha_creacion"],
              $data_table[$clave]["fecha_fin"],
              $data_table[$clave]["estado"],
              $data_table[$clave]["satelital"],
              $data_table[$clave]["ciudad_origen"],
              $data_table[$clave]["ciudad_destino"],
              $data_table[$clave]["direccion_descargue"],
              $data_table[$clave]["sello"],
              $data_table[$clave]["numero_contenedor"],
              $data_table[$clave]["link_localizador"],
              $data_table[$clave]["usuario_satelital"],
              $data_table[$clave]["clave_satelital"],
              $data_table[$clave]["ruta"]);
              array_push($arrayServicios, $objServicios);
            }
            return $arrayServicios;
          }else{
            return null;
          }
        }

      public function nServiciosActivos(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT count(*) as 'numero' FROM `servicio` where estado ='ACTIVO' order by fecha_fin");
        $objServicios = null;
        $arrayServicios = array();
        if(count($data_table) >0){
            return $data_table[0]["numero"];
          }else{
            return 0;
          }
        }

  public function listaTodosServiciosCerrados(){
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio` where estado ='CERRADO'");
    $objServicios = null;
    $arrayServicios = array();
    if(count($data_table) >0){
      foreach ($data_table as $clave => $valor) {
        $objServicios = new servicio(
          $data_table[$clave]["id_servicio"],
          $data_table[$clave]["id_conductor"],
          $data_table[$clave]["id_vehiculo"],
          $data_table[$clave]["id_cliente"],
          $data_table[$clave]["id_empleado"],
          $data_table[$clave]["manifiesto"],
          $data_table[$clave]["fecha_creacion"],
          $data_table[$clave]["fecha_fin"],
          $data_table[$clave]["estado"],
          $data_table[$clave]["satelital"],
          $data_table[$clave]["ciudad_origen"],
          $data_table[$clave]["ciudad_destino"],
          $data_table[$clave]["direccion_descargue"],
          $data_table[$clave]["sello"],
          $data_table[$clave]["numero_contenedor"],
          $data_table[$clave]["link_localizador"],
          $data_table[$clave]["usuario_satelital"],
          $data_table[$clave]["clave_satelital"],
          $data_table[$clave]["ruta"]);
          array_push($arrayServicios, $objServicios);
        }
        return $arrayServicios;
      }else{
        return null;
      }
    }
/****************************************************************************************************************************************/
public function servicioId($id){

  $data_source = new DataSource();
  $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio` where id_servicio = :id order by fecha_fin",array(
    ':id'=>$id));
    $objServicios = null;
    if(count($data_table) > 0){
      $objServicios = new servicio(
        $data_table[0]["id_servicio"],
        $data_table[0]["id_conductor"],
        $data_table[0]["id_vehiculo"],
        $data_table[0]["id_cliente"],
        $data_table[0]["id_empleado"],
        $data_table[0]["manifiesto"],
        $data_table[0]["fecha_creacion"],
        $data_table[0]["fecha_fin"],
        $data_table[0]["estado"],
        $data_table[0]["satelital"],
        $data_table[0]["ciudad_origen"],
        $data_table[0]["ciudad_destino"],
        $data_table[0]["direccion_descargue"],
        $data_table[0]["sello"],
        $data_table[0]["numero_contenedor"],
        $data_table[0]["link_localizador"],
        $data_table[0]["usuario_satelital"],
        $data_table[0]["clave_satelital"],
        $data_table[0]["ruta"]);
        return $objServicios;
      }else{
        return null;
      }
    }

/****************************************************************************************************************************************/
  public function servicioEmp($id){
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio` where id_empleado = :id order by fecha_fin",array(
      ':id'=>$id));
      $objServicios = null;
      if(count($data_table) == 1){
        foreach ($data_table as $clave => $valor) {
          $objServicios = new servicio();
          $objServicios->setId_servicio($data_table[$clave]["id_servicio"]);
          $objServicios->setId_empleado($data_table[$clave]["id_conductor"]);
          $objServicios->setId_conductor($data_table[$clave]["id_vehiculo"]);
          $objServicios->setId_vehiculo($data_table[$clave]["id_cliente"]);
          $objServicios->setId_cliente($data_table[$clave]["id_empleado"]);
          $objServicios->setManifiesto($data_table[$clave]["manifiesto"]);
          $objServicios->setFecha_creacion($data_table[$clave]["fecha_creacion"]);
          $objServicios->setFecha_fin($data_table[$clave]["fecha_fin"]);
          $objServicios->setEstado($data_table[$clave]["estado"]);
          $objServicios->setSatelital($data_table[$clave]["satelital"]);
          $objServicios->setCiudad_origen($data_table[$clave]["ciudad_origen"]);
          $objServicios->setCiudad_destino($data_table[$clave]["ciudad_destino"]);
          $objServicios->setDireccion_descargue($data_table[$clave]["direccion_descargue"]);
          $objServicios->setSello($data_table[$clave]["sello"]);
          $objServicios->setNumero_contenedor($data_table[$clave]["numero_contenedor"]);
          $objServicios->setLink_localizador($data_table[$clave]["link_localizador"]);
          $objServicios->setUsuario_satelital($data_table[$clave]["usuario_satelital"]);
          $objServicios->setClave_satelital($data_table[$clave]["clave_satelital"]);
          $objServicios->setRuta($data_table[$clave]["ruta"]);
        }
        return $objServicios;
      }else{
        return null;
      }
    }
    public function servicioEmpleado($nombre,$fechai,$fechaf){
      $data_source = new DataSource();
      $arrayServicios = array();

      $data_table = $data_source->ejecutarConsulta("SELECT  * FROM servicio  join empleado on(servicio.id_empleado = empleado.id_empleado)
       where  empleado.nombre  like :id and  (fecha_creacion >= :fechai  AND fecha_fin <= :fechaf) ",array(
        ':id'=>"%".$nombre."%",
        'fechai'=>$fechai,
        'fechaf'=>$fechaf));
        $objServicios = null;
        if(count($data_table) > 0){
          foreach ($data_table as $clave => $valor) {
            $objServicios = new servicio(
            $data_table[$clave]["id_servicio"],
            $data_table[$clave]["id_conductor"],
            $data_table[$clave]["id_vehiculo"],
            $data_table[$clave]["id_cliente"],
            $data_table[$clave]["id_empleado"],
            $data_table[$clave]["manifiesto"],
            $data_table[$clave]["fecha_creacion"],
            $data_table[$clave]["fecha_fin"],
            $data_table[$clave]["estado"],
            $data_table[$clave]["satelital"],
            $data_table[$clave]["ciudad_origen"],
            $data_table[$clave]["ciudad_destino"],
            $data_table[$clave]["direccion_descargue"],
            $data_table[$clave]["sello"],
            $data_table[$clave]["numero_contenedor"],
            $data_table[$clave]["link_localizador"],
            $data_table[$clave]["usuario_satelital"],
            $data_table[$clave]["clave_satelital"],
            $data_table[$clave]["ruta"]);
            array_push($arrayServicios, $objServicios);
          }
          return $arrayServicios;
        }else{
          return null;
        }
      }
/****************************************************************************************************************************************/
 public function servicioCli($id){
   $data_source = new DataSource();
   $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio` where id_cliente = :id order by fecha_fin",array(
     ':id'=>$id));
     $objServicios = null;
     if(count($data_table) == 1){
       foreach ($data_table as $clave => $valor) {
         $objServicios = new servicio();
         $objServicios->setId_servicio($data_table[$clave]["id_servicio"]);
         $objServicios->setId_empleado($data_table[$clave]["id_conductor"]);
         $objServicios->setId_conductor($data_table[$clave]["id_vehiculo"]);
         $objServicios->setId_vehiculo($data_table[$clave]["id_cliente"]);
         $objServicios->setId_cliente($data_table[$clave]["id_empleado"]);
         $objServicios->setManifiesto($data_table[$clave]["manifiesto"]);
         $objServicios->setFecha_creacion($data_table[$clave]["fecha_creacion"]);
         $objServicios->setFecha_fin($data_table[$clave]["fecha_fin"]);
         $objServicios->setEstado($data_table[$clave]["estado"]);
         $objServicios->setSatelital($data_table[$clave]["satelital"]);
         $objServicios->setCiudad_origen($data_table[$clave]["ciudad_origen"]);
         $objServicios->setCiudad_destino($data_table[$clave]["ciudad_destino"]);
         $objServicios->setDireccion_descargue($data_table[$clave]["direccion_descargue"]);
         $objServicios->setSello($data_table[$clave]["sello"]);
         $objServicios->setNumero_contenedor($data_table[$clave]["numero_contenedor"]);
         $objServicios->setLink_localizador($data_table[$clave]["link_localizador"]);
         $objServicios->setUsuario_satelital($data_table[$clave]["usuario_satelital"]);
         $objServicios->setClave_satelital($data_table[$clave]["clave_satelital"]);
         $objServicios->setRuta($data_table[$clave]["ruta"]);
       }
       return $objServicios;
     }else{
       return null;
     }
   }
/********************************************************************************************/
public function serviciosCli($id,$fechai,$fechaf){
  $data_source = new DataSource();
  $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio`
    where estado ='CERRADO'and  id_cliente =:id and fecha_fin between :fechai
     and fechaf order by fecha_fin",array(
    ':id'=>$id,
    ':fechai' =>$fechai,
    ':fechaf' =>$fechaf
   ));
    $objServicios = null;
    $arrayServicios = array();
    if(count($data_table) == 1){
      foreach ($data_table as $clave => $valor) {
        $objServicios = new servicio($data_table[$clave]["id_servicio"],
      $data_table[$clave]["id_conductor"],
      $data_table[$clave]["id_vehiculo"],
      $data_table[$clave]["id_cliente"],
      $data_table[$clave]["id_empleado"],
      $data_table[$clave]["manifiesto"],
      $data_table[$clave]["fecha_creacion"],
      $data_table[$clave]["fecha_fin"],
      $data_table[$clave]["estado"],
      $data_table[$clave]["satelital"],
      $data_table[$clave]["ciudad_origen"],
      $data_table[$clave]["ciudad_destino"],
      $data_table[$clave]["direccion_descargue"],
      $data_table[$clave]["sello"],
      $data_table[$clave]["numero_contenedor"],
      $data_table[$clave]["link_localizador"],
      $data_table[$clave]["usuario_satelital"],
      $data_table[$clave]["clave_satelital"],
      $data_table[$clave]["ruta"]
);
       array_push($arrayServicios, $objServicios);
      }
      return $objServicios;
    }else{
      return null;
    }
  }

  public function serviciosClinombre($id){
    $data_source = new DataSource();
    $sql ="SELECT  * FROM servicio  join cliente on(servicio.id_cliente = cliente.id_cliente)  
    where estado ='CERRADO' AND  cliente.razon_social  like  '%".$id."%' || cliente.nombre_contacto like '%".$id."%'  ORDER BY `servicio`.`fecha_creacion` DESC";
    //echo $sql;
    $data_table = $data_source->ejecutarConsulta($sql);

      $objServicios = null;
      $arrayServicios = array();
      if(count($data_table) > 0){
        foreach ($data_table as $clave => $valor) {
          $objServicios = new servicio(
          $data_table[$clave]["id_servicio"],
          $data_table[$clave]["id_conductor"],
          $data_table[$clave]["id_vehiculo"],
          $data_table[$clave]["id_cliente"],
          $data_table[$clave]["id_empleado"],
          $data_table[$clave]["manifiesto"],
          $data_table[$clave]["fecha_creacion"],
          $data_table[$clave]["fecha_fin"],
          $data_table[$clave]["estado"],
          $data_table[$clave]["satelital"],
          $data_table[$clave]["ciudad_origen"],
          $data_table[$clave]["ciudad_destino"],
          $data_table[$clave]["direccion_descargue"],
          $data_table[$clave]["sello"],
          $data_table[$clave]["numero_contenedor"],
          $data_table[$clave]["link_localizador"],
          $data_table[$clave]["usuario_satelital"],
          $data_table[$clave]["clave_satelital"],
          $data_table[$clave]["ruta"]
  );
         array_push($arrayServicios, $objServicios);
        }
        return $arrayServicios;
      }else{
        echo "nada ";
        return null;
      }
    }

    public function serviciosClientePlaca($id,$placa){

      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio` JOIN vehiculo ON
      (servicio.id_vehiculo=vehiculo.id_vehiculo) JOIN cliente ON (vehiculo.id_cliente=cliente.id_cliente)
        where cliente.id_cliente = :id AND vehiculo.placa like :placa",array(
        ':id'=>$id,
        ':placa'=>"%".$placa."%"));
        $objServicios = null;
        $arrayServicios = array();
        if(count($data_table) > 0){

          foreach ($data_table as $clave => $valor) {

          $objServicios = new servicio($data_table[$clave]["id_servicio"],
          $data_table[$clave]["id_conductor"],
          $data_table[$clave]["id_vehiculo"],
          $data_table[$clave]["id_cliente"],
          $data_table[$clave]["id_empleado"],
          $data_table[$clave]["manifiesto"],
          $data_table[$clave]["fecha_creacion"],
          $data_table[$clave]["fecha_fin"],
          $data_table[$clave]["estado"],
          $data_table[$clave]["satelital"],
          $data_table[$clave]["ciudad_origen"],
          $data_table[$clave]["ciudad_destino"],
          $data_table[$clave]["direccion_descargue"],
          $data_table[$clave]["sello"],
          $data_table[$clave]["numero_contenedor"],
          $data_table[$clave]["link_localizador"],
          $data_table[$clave]["usuario_satelital"],
          $data_table[$clave]["clave_satelital"],
          $data_table[$clave]["ruta"]
    );
           array_push($arrayServicios, $objServicios);
          }
          return $arrayServicios;
        }else{
          return null;
        }
      }

  public function serviciosCliente($id){

    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio`
      where id_cliente = :id ",array(
      ':id'=>$id));
      $objServicios = null;
      $arrayServicios = array();
      if(count($data_table) > 0){

        foreach ($data_table as $clave => $valor) {

        $objServicios = new servicio($data_table[$clave]["id_servicio"],
        $data_table[$clave]["id_conductor"],
        $data_table[$clave]["id_vehiculo"],
        $data_table[$clave]["id_cliente"],
        $data_table[$clave]["id_empleado"],
        $data_table[$clave]["manifiesto"],
        $data_table[$clave]["fecha_creacion"],
        $data_table[$clave]["fecha_fin"],
        $data_table[$clave]["estado"],
        $data_table[$clave]["satelital"],
        $data_table[$clave]["ciudad_origen"],
        $data_table[$clave]["ciudad_destino"],
        $data_table[$clave]["direccion_descargue"],
        $data_table[$clave]["sello"],
        $data_table[$clave]["numero_contenedor"],
        $data_table[$clave]["link_localizador"],
        $data_table[$clave]["usuario_satelital"],
        $data_table[$clave]["clave_satelital"],
        $data_table[$clave]["ruta"]
  );
         array_push($arrayServicios, $objServicios);
        }
        return $arrayServicios;
      }else{
        return null;
      }
    }
/****************************************************************************************************************************************/
  public function registrarServicio(servicio $servicio){
    $data_source = new DataSource();
    $sql = "INSERT INTO servicio VALUES (null,:id_conductor,:id_vehiculo,:id_cliente,
      :id_empleado,:manifiesto,:fecha_creacion,:fecha_fin,:estado,:satelital,:ciudad_origen,
      :ciudad_destino,:direccion_descargue,:sello,:numero_contenedor,:link_localizador,:usuario_satelital,
      :clave_satelital,:ruta)";
$datos=array(

        ':id_conductor'=>$servicio->getId_conductor(),
        ':id_vehiculo'=>$servicio->getId_vehiculo(),
        ':id_cliente'=>$servicio->getId_cliente(),
        ':id_empleado'=>$servicio->getId_empleado(),
        ':manifiesto'=>$servicio->getManifiesto(),
        ':fecha_creacion'=>$servicio->getFecha_creacion(),
        ':fecha_fin'=>'0000-00-00 00:00:00',
        ':estado'=>$servicio->getEstado(),
        ':satelital'=>$servicio->getSatelital(),
        ':ciudad_origen'=>$servicio->getCiudad_origen(),
        ':ciudad_destino'=>$servicio->getCiudad_destino(),
        ':direccion_descargue'=>$servicio->getDireccion_descargue(),
        ':sello'=>$servicio->getSello(),
        ':numero_contenedor'=>$servicio->getNumero_contenedor(),
        ':link_localizador'=>$servicio->getLink_localizador(),
        ':usuario_satelital'=>$servicio->getUsuario_satelital(),
        ':clave_satelital'=>$servicio->getClave_satelital(),
        ':ruta'=>$servicio->getRuta());
      $resultado = $data_source->ejecutarActualizacion($sql,$datos);

     // print_r($datos);

    return $resultado;
  }
/****************************************************************************************************************************************/
  public function actualizarServicio(servicio $servicio){
    $data_source = new DataSource();
    $sql = "UPDATE servicio SET id_conductor = :id_conductor,
    id_vehiculo = :id_vehiculo,
    id_cliente = :id_cliente,
    manifiesto = :manifiesto,
    fecha_creacion = :fecha_creacion,
    fecha_fin = :fecha_fin,
    estado = :estado,
    satelital = :satelital,
    ciudad_origen = :ciudad_origen,
    ciudad_destino = :ciudad_destino,
    direccion_descargue = :direccion_descargue,
    sello = :sello,
    numero_contenedor = :numero_contenedor,
    link_localizador = :link_localizador,
    usuario_satelital = :usuario_satelital,
    clave_satelital = :clave_satelital,
    ruta = :ruta
    WHERE idservicio = :idservicio
    ";
    $resultado = $data_source->ejecutarActualizacion($sql,array(
      ':id_conductor'=>$servicio->getId_conductor(),
      ':id_vehiculo'=>$servicio->getId_vehiculo(),
      ':id_cliente'=>$servicio->getId_cliente(),
      ':id_empleado'=>$servicio->getId_empleado(),
      ':manifiesto'=>$servicio->getManifiesto(),
      ':fecha_creacion'=>$servicio->getFecha_creacion(),
      ':fecha_fin'=>$servicio->getFecha_fin(),
      ':estado'=>$servicio->getEstado(),
      ':satelital'=>$servicio->getSatelital(),
      ':ciudad_origen'=>$servicio->getCiudad_origen(),
      ':ciudad_destino'=>$servicio->getCiudad_destino(),
      ':direccion_descargue'=>$servicio->getDireccion_descargue(),
      ':sello'=>$servicio->getSello(),
      ':numero_contenedor'=>$servicio->getNumero_contenedor(),
      ':link_localizador'=>$servicio->getLink_localizador(),
      ':usuario_satelital'=>$servicio->getUsuario_satelital(),
      ':clave_satelital'=>$servicio->getClave_satelital(),
      ':ruta'=>$servicio->getRuta(),
      ':idservicio'=>$servicio->getId_servicio()
    )
  );
  return $resultado;
}
  /****************************************************************************************************************************************/
  public function cerrarServicio($id_servicio){
    setlocale(LC_ALL,"es_ES");
    ini_set('date.timezone','America/Bogota');
    date("Y-m-d H:i:s");
    $fecha = date("Y-m-d H:i:s");
    $data_source = new DataSource();
    $sql = "UPDATE servicio SET estado = 'CERRADO' , fecha_fin = '".$fecha."' WHERE id_servicio = :id_servicio";
    $resultado = $data_source->ejecutarActualizacion($sql,array(':id_servicio'=>intval($id_servicio)));
      return $resultado;
    }
  }

  /*Anotacionses sql
  "
  SELECT  cliente.nombre_contacto as 'nombre_cliente ' , conductor.nombre_conductor as 'nombre_conductor' ,estado ,ruta ,servicio.fecha_creacion as 'fechai' , servicio.fecha_fin as 'fechaf' , servicio.satelital as 'satelital '
  FROM servicio  join cliente on(servicio.id_cliente = cliente.id_cliente)  join  conductor join vehiculo
   where estado ='CERRADO' AND  cliente.nombre_contacto  like ':id%'   and  (fecha_creacion >= ':fechai'  AND fecha_fin <= ':fechaf' )
  "

  */
?>
