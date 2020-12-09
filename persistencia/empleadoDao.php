<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once (PERSISTENCIA_PATH."DataSource.php");
require_once (MODEL_PATH."servicios.php");
require_once (MODEL_PATH."minuta.php");
require_once (MODEL_PATH."conductor.php");
require_once (MODEL_PATH."vehiculo.php");
require_once (MODEL_PATH."empleado.php");
require_once (MODEL_PATH."usuario.php");
require_once (MODEL_PATH."cliente.php");
class empleadoDao
{

  public function listaEmpleados(){

    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `empleado` ");
    $objEmpleado = null;
    $arrayEmpleado = array();

    if(count($data_table)>0){
    foreach ($data_table as $clave => $valor) {
    $objEmpleado = new empleado(
        $data_table[$clave]["id_empleado"],
        $data_table[$clave]["id_usuario"],
        $data_table[$clave]["nombre"],
        $data_table[$clave]["tipo_documento"],
        $data_table[$clave]["numero_documento"],
        $data_table[$clave]["direccion"],
        $data_table[$clave]["ciudad"],
        $data_table[$clave]["fijo"],
        $data_table[$clave]["celular1"],
        $data_table[$clave]["celular2"],
        $data_table[$clave]["celular3"],
        $data_table[$clave]["email"],
        $data_table[$clave]["foto"]);
        array_push($arrayEmpleado, $objEmpleado);
      }
      return $arrayEmpleado;
    }else{   return null;}
}
public function nEmpleados(){

  $data_source = new DataSource();
  $data_table = $data_source->ejecutarConsulta("SELECT count(*) as 'numero' FROM `empleado` ");
  $objEmpleado = null;
  $arrayEmpleado = array();

  if(count($data_table)>0){
    return  $data_table[0]["numero"];
  }else{return 0;}
}

    public function empleadoId($id_empleado){

      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `empleado` where id_empleado = :id "
      ,array(':id'=>$id_empleado));
      $objEmpleado = new empleado(
          $data_table[0]["id_empleado"],
          $data_table[0]["id_usuario"],
          $data_table[0]["nombre"],
          $data_table[0]["tipo_documento"],
          $data_table[0]["numero_documento"],
          $data_table[0]["direccion"],
          $data_table[0]["ciudad"],
          $data_table[0]["fijo"],
          $data_table[0]["celular1"],
          $data_table[0]["celular2"],
          $data_table[0]["celular3"],
          $data_table[0]["email"],
          $data_table[0]["foto"]);
        return $objEmpleado;
      }

      public function empleadoIdUsuario($id_usuario){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `empleado` where id_usuario = :id "
        ,array(':id'=>$id_usuario));
        $objEmpleado = new empleado(
            $data_table[0]["id_empleado"],
            $data_table[0]["id_usuario"],
            $data_table[0]["nombre"],
            $data_table[0]["tipo_documento"],
            $data_table[0]["numero_documento"],
            $data_table[0]["direccion"],
            $data_table[0]["ciudad"],
            $data_table[0]["fijo"],
            $data_table[0]["celular1"],
            $data_table[0]["celular2"],
            $data_table[0]["celular3"],
            $data_table[0]["email"],
            $data_table[0]["foto"]);
          return $objEmpleado;
        }
      public function registrarEmpleado(empleado $empleado){
        $data_source = new DataSource();
        $sql = "INSERT INTO empleado VALUES (:id_empleado,:id_usuario,:nombre,:tipo_documento,:numero_documento,:direccion,
        :ciudad,:fijo,:celular1,:celular2,:celular3,:email,:foto)";

          $resultado = $data_source->ejecutarActualizacion($sql,array(
            ':id_empleado'=>$empleado->getId_empleado(),
            ':id_usuario'=>$empleado->getId_usuario(),
            ':nombre'=>$empleado->getNombre(),
            ':tipo_documento'=>$empleado->getTipo_documento(),
            ':numero_documento'=>$empleado->getNumero_documento(),
            ':direccion'=>$empleado->getDireccion(),
            ':ciudad'=>$empleado->getCiudad(),
            ':fijo'=>$empleado->getFijo(),
            ':celular1'=>$empleado->getCelular1(),
            ':celular2'=>$empleado->getCelular2(),
            ':celular3'=>$empleado->getCelular3(),
            ':email'=>$empleado->getEmail(),
            ':foto'=>$empleado->getFoto()
          )
        );
        return $resultado;

      }

      public function actualizarEmpleado(empleado $empleado){
        $data_source = new DataSource();
        $sql = "UPDATE empleado SET
        id_usuario =:id_usuario,
        nombre = :nombre,
        tipo_documento = :tipo_documento,
        numero_documento = :numero_documento,
        direccion= :direccion,
        ciudad = :ciudad,
        fijo = :fijo,
        email = :email,
        foto = :foto,
        celular1 = :celular1,
        celular2 = :celular2,
        celular3 = :celular3
        WHERE id_empleado = :id_empleado";
        $resultado = $data_source->ejecutarActualizacion($sql,array(
          ':id_empleado'=>$empleado->getId_empleado(),
          ':id_usuario'=>$empleado->getId_usuario(),
          ':nombre'=>$empleado->getNombre(),
          ':tipo_documento'=>$empleado->getTipo_documento(),
          ':numero_documento'=>$empleado->getNumero_documento(),
          ':direccion'=>$empleado->getDireccion(),
          ':ciudad'=>$empleado->getCiudad(),
          ':fijo'=>$empleado->getFijo(),
          ':celular1'=>$empleado->getCelular1(),
          ':celular2'=>$empleado->getCelular2(),
          ':celular3'=>$empleado->getCelular3(),
          ':email'=>$empleado->getEmail(),
          ':foto'=>$empleado->getFoto())
      );
      return $resultado;
    }



  }
  ?>
