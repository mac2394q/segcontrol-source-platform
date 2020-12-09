<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once (PERSISTENCIA_PATH."DataSource.php");
require_once (MODEL_PATH."acompanante.php");

class acompananteDao{

  public function acompananteId($id_acompanante){

    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `acompanante`
       where idacompanante = :id "
    ,array(':id'=>$id_acompanante));
    $ObjAcompanante = null;

  if( count($data_table)>0){
        $ObjAcompanante = new acompanante(
        $data_table[0]["idacompanante"],
        $data_table[0]["nombre"],
        $data_table[0]["cedula"],
        $data_table[0]["telefono"],
        $data_table[0]["placa"],
        $data_table[0]["tipo"],
        $data_table[0]["marca"],
        $data_table[0]["color"]);
      return $ObjAcompanante;}
      else{
        return false;
      }
    }
    public function acompananteNombre($nombre){

      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `acompanante` where nombre = :nombre "
      ,array(':nombre'=>$nombre));
      $ObjAcompanante = null;

    if( count($data_table)>0){
          $ObjAcompanante = new acompanante(
          $data_table[0]["id_acompanante"],
          $data_table[0]["nombre"],
          $data_table[0]["cedula"],
          $data_table[0]["telefono"],
          $data_table[0]["placa"],
          $data_table[0]["tipo"],
          $data_table[0]["marca"],
          $data_table[0]["color"]);
        return $ObjAcompanante;}
        else{
          return false;
        }
      }

    public function registrarAcompanante(acompanante $acompanante){
      $data_source = new DataSource();
      $sql2 = "INSERT INTO acompanante VALUES (null,:nombre,:cedula,:telefono,:placa,
        :tipo,:marca,:color)";
        $resultado2 = $data_source->ejecutarActualizacion($sql2,array(
          ':nombre'=>$acompanante->getNombre(),
          ':cedula'=>$acompanante->getCedula(),
          ':telefono'=>$acompanante->getTelefono(),
          ':placa'=>$acompanante->getPlaca(),
          ':tipo'=>$acompanante->getTipo(),
          ':marca'=>$acompanante->getMarca(),
          ':color'=>$acompanante->getColor())
        );
      return $resultado2;
    }
    public function actualizarAcompanante(acompanante $acompanante){
      $data_source = new DataSource();
      $sql = "UPDATE acompanante SET
      nombre = :nombre,
      cedula= :cedula,
      telefono = :telefono,
      placa= :placa,
      tipo = :tipo,
      marca = :marca,
      color = :color
      WHERE idacompanante=:idacompanante" ;

      $resultado2 = $data_source->ejecutarActualizacion($sql,array(
        ':idacompanante'=>$acompanante->getId_acompanante(),
        ':nombre'=>$acompanante->getNombre(),
        ':cedula'=>$acompanante->getCedula(),
        ':telefono'=>$acompanante->getTelefono(),
        ':placa'=>$acompanante->getPlaca(),
        ':tipo'=>$acompanante->getTipo(),
        ':marca'=>$acompanante->getMarca(),
        ':color'=>$acompanante->getColor())
      );
    return $resultado2;
  }
  public function listaAcompanante(){

    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `acompanante` ");
    $ObjAcompanante = null;
    $arrayAcompanante = array();

    foreach ($data_table as $clave => $valor) {
    $ObjAcompanante = new acompanante(
        $data_table[$clave]["idacompanante"],
        $data_table[$clave]["nombre"],
        $data_table[$clave]["cedula"],
        $data_table[$clave]["telefono"],
        $data_table[$clave]["placa"],
        $data_table[$clave]["tipo"],
        $data_table[$clave]["marca"],
        $data_table[$clave]["color"]);
        array_push(  $arrayAcompanante, $ObjAcompanante);
      }
      return   $arrayAcompanante;
    }

    public function buscarAcompanante($id_conductor){
      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `acompanante` where
        acompanante.nombre like :id"
      ,array(':id'=>"%".$id_conductor."%"));
      $ObjAcompanante = null;
      $arrayAcompanante = array();
      if(count($data_table)>0){
        foreach ($data_table as $clave => $valor) {
        $ObjAcompanante = new acompanante(
            $data_table[$clave]["idacompanante"],
            $data_table[$clave]["nombre"],
            $data_table[$clave]["cedula"],
            $data_table[$clave]["telefono"],
            $data_table[$clave]["placa"],
            $data_table[$clave]["tipo"],
            $data_table[$clave]["marca"],
            $data_table[$clave]["color"]);
            array_push(  $arrayAcompanante, $ObjAcompanante);
          }
        return $arrayAcompanante;
      }else{
        return null;
      }

      }

  }

?>
