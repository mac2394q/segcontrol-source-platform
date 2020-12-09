<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once (PERSISTENCIA_PATH."DataSource.php");
require_once (MODEL_PATH."correoServicios.php");

class correoServiciosDao{

  public function listaCorreoServicios(){

    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `correos_servicio` ");
    $objcorreoServicios = null;
    $arraycorreoServicios = array();
    if(count($data_table)>0){
    foreach ($data_table as $clave => $valor) {
      $objcorreoServicios = new correoServicios(
        $data_table[$clave]["idcorreos_servicios"],
        $data_table[$clave]["correo"],
        $data_table[$clave]["clave"],
        $data_table[$clave]["activacion"]);
        array_push($arraycorreoServicios, $objcorreoServicios);
      }
      return $arraycorreoServicios;
    }else{
      return null;
    }

    }

    public function CorreoServiciosId($id_correoServicios){

      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `correos_servicio` where idcorreos_servicios = :id "
      ,array(':id'=>$id_correoServicios));
      $objcorreoServicios = null;
      if(count($data_table)>0){

         $objcorreoServicios = new correoServicios(
             $data_table[0]["idcorreos_servicios"],
             $data_table[0]["correo"],
             $data_table[0]["clave"],
             $data_table[0]["activacion"]);
            return $objcorreoServicios;
        }else{
             return null;
        }

      }

      public function CorreoServiciosIdActivacion(){

      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `correos_servicio` where activacion = 1 LIMIT 1 ");
      $objcorreoServicios = null;
      if(count($data_table)>0){

         $objcorreoServicios = new correoServicios(
             $data_table[0]["idcorreos_servicios"],
             $data_table[0]["correo"],
             $data_table[0]["clave"],
             $data_table[0]["activacion"]);
            return $objcorreoServicios;
        }else{
             return null;
        }

      }

    public function registrarCorreoServicios(correoServicios $correoServicios){
        $data_source = new DataSource();
        $sql = "INSERT INTO correos_servicio VALUES (null,:correo,:clave,:activacion)";

          $resultado = $data_source->ejecutarActualizacion($sql,array(
            ':correo'=>$correoServicios->getCorreo(),
            ':clave'=>$correoServicios->getClave(),
            ':activacion'=>$correoServicios->getActivacion())
        );
        return $resultado;

      }

      public function actualizarCorreoServicios($id,$act){
        $data_source = new DataSource();
        $sql = "UPDATE correos_servicio SET
        activacion = :activacion
        WHERE idcorreos_servicios = :idcorreos_servicios";
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ':idcorreos_servicios'=>$id,
            ':activacion'=>$act));
      return $resultado;
    }
    
    public function actualizarCorreoServiciosActivacion($act){
        $data_source = new DataSource();
        $sql = "UPDATE correos_servicio SET
        activacion = :activacion
        WHERE activacion = 1";
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ':activacion'=>$act)
        );
      return $resultado;
    }
  }
  ?>
