<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once (PERSISTENCIA_PATH."DataSource.php");
require_once (MODEL_PATH."servicios.php");
require_once (MODEL_PATH."minuta.php");
require_once (MODEL_PATH."conductor.php");
require_once (MODEL_PATH."vehiculo.php");
class vehiculoDao
{

  public function listaVehiculo(){

    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `vehiculo` ");
    $objVehiculo = null;
    $arrayVehiculo = array();
   if(count($data_table)>0){
    foreach ($data_table as $clave => $valor) {

        $objVehiculo = new vehiculo(
        $data_table[$clave]["id_vehiculo"],
        $data_table[$clave]["id_cliente"],
        $data_table[$clave]["placa"],
        $data_table[$clave]["marca"],
        $data_table[$clave]["color"],
        $data_table[$clave]["n_trailer"]);
        array_push($arrayVehiculo, $objVehiculo);
      }
      return $arrayVehiculo;
    }else{return null;}
    }

    public function listaVehiculoId($id_vehiculo){

      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `vehiculo` where id_vehiculo = :id "
      ,array(':id'=>$id_vehiculo));
      $objVehiculo = null;
      if(count($data_table)>0){
      //  echo "id cliente ".$data_table[0]["id_cliente"];
          $objVehiculo = new vehiculo(
          $data_table[0]["id_vehiculo"],
          $data_table[0]["id_cliente"],
          $data_table[0]["placa"],
          $data_table[0]["marca"],
          $data_table[0]["color"],
          $data_table[0]["n_trailer"]);
        return $objVehiculo;
      }else{
         return null;
      }
      }

      public function buscarVehiculo($vehiculo){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `vehiculo` where
          vehiculo.placa like :id"
        ,array(':id'=>"%".$vehiculo."%"));
        $objConductor = null;
        $arrayConductor = array();
        if(count($data_table)>0){
        foreach ($data_table as $clave => $valor) {
          $objVehiculo = new vehiculo(
          $data_table[$clave]["id_vehiculo"],
          $data_table[$clave]["id_cliente"],
          $data_table[$clave]["placa"],
          $data_table[$clave]["marca"],
          $data_table[$clave]["color"],
          $data_table[$clave]["n_trailer"]);
          array_push($arrayConductor,$objVehiculo);
          }
          return $arrayConductor;
        }else{
          return null;
        }

        }

      public function listaVehiculoCli($id_cliente){

        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `vehiculo` where id_cliente = :id "
        ,array(':id'=>$id_cliente));
        $objVehiculo = null;
        $arrayVehiculo = array();
        foreach ($data_table as $clave => $valor) {
            $objVehiculo = new vehiculo(
            $data_table[$clave]["id_vehiculo"],
            $data_table[$clave]["id_cliente"],
            $data_table[$clave]["placa"],
            $data_table[$clave]["marca"],
            $data_table[$clave]["color"],
            $data_table[$clave]["n_trailer"]);
            array_push($arrayVehiculo, $objConductor);
          }
          return $arrayVehiculo;
        }


      public function registrarVehiculo(vehiculo $vehiculo){
        $data_source = new DataSource();
        $sql = "INSERT INTO vehiculo VALUES (:id_vehiculo,:id_cliente,:placa,:marca,
          :color,:n_trailer)";

          $resultado = $data_source->ejecutarActualizacion($sql,array(
            ':id_vehiculo'=>$vehiculo->getId_vehiculo(),
            ':id_cliente'=>$vehiculo->getId_cliente(),
            ':placa'=>$vehiculo->getPlaca(),
            ':marca'=>$vehiculo->getMarca(),
            ':color'=>$vehiculo->getColor(),
            ':n_trailer'=>$vehiculo->getN_trailer()
          )
        );
        return $resultado;

      }

      public function actualizarVehiculo(vehiculo $vehiculo){
        $data_source = new DataSource();
        $sql = "UPDATE  vehiculo SET
        id_cliente =:id_cliente,
        placa = :placa,
        marca = :marca,
        color = :color,
        n_trailer = :trailer
        WHERE id_vehiculo = :id_vehiculo
        ";
        $resultado = $data_source->ejecutarActualizacion($sql,array(
          ':id_vehiculo'=>$vehiculo->getId_vehiculo(),
          ':id_cliente'=>$vehiculo->getId_cliente(),
          ':placa'=>$vehiculo->getPlaca(),
          ':marca'=>$vehiculo->getMarca(),
          ':color'=>$vehiculo->getColor(),
          ':trailer'=>$vehiculo->getN_trailer()
        ));
      return $resultado;

    }



  }
  ?>
