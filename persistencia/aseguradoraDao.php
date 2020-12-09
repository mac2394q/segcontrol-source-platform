<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once (PERSISTENCIA_PATH."DataSource.php");
require_once (MODEL_PATH."cliente.php");
require_once (MODEL_PATH."aseguradora.php");
class aseguradoraDao{

  public function aseguradoraId($id_aseguradora){

    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `aseguradoras` where id_aseguradora = :id "
    ,array(':id'=>$id_aseguradora));
    $ObjAseguradora = null;

  if( count($data_table)>0){
        $ObjAseguradora = new aseguradora(
        $data_table[0]["id_aseguradora"],
        $data_table[0]["valor"],
        $data_table[0]["fecha"],
        $data_table[0]["hora"],
        $data_table[0]["autorizacion"],
        $data_table[0]["area"],
        $data_table[0]["tipo_servicio"],
        $data_table[0]["descripcion"],
        $data_table[0]["placa"],
        $data_table[0]["contenedor"],
        $data_table[0]["tipo_vehiculo"],
        $data_table[0]["color"],
        $data_table[0]["id_acompanante"],
        $data_table[0]["hora_llegada"],
        $data_table[0]["hora_finalizacion"],
        $data_table[0]["id_cliente"]);
      return $ObjAseguradora;
      }else{
        return false;
      }
    }
    public function registrarAseguradora(aseguradora $aseguradora){
      $data_source = new DataSource();
      $sql2 = "INSERT INTO aseguradoras VALUES (null,:valor,:fecha,:hora,:autorizacion,
        :area,:tipo_servicio,:descripcion,:placa,:contenedor,:tipo_vehiculo,:color,:id_acompanante,:hora_llegada,
        :hora_finalizacion,:id_cliente)";
        $resultado2 = $data_source->ejecutarActualizacion($sql2,array(
          ':valor'=>$aseguradora->getValor(),
          ':fecha'=>$aseguradora->getFecha(),
          ':hora'=>$aseguradora->getHora(),
          ':autorizacion'=>$aseguradora->getAutorizacion(),
          ':area'=>$aseguradora->getArea(),
          ':tipo_servicio'=>$aseguradora->getTipo_servicio(),
          ':descripcion'=>$aseguradora->getDescripcion(),
          ':placa'=>$aseguradora->getPlaca(),
          ':contenedor'=>$aseguradora->getContenedor(),
          ':tipo_vehiculo'=>$aseguradora->getTipo_vehiculo(),
          ':color'=>$aseguradora->getColor(),
          ':id_acompanante'=>$aseguradora->getId_Acompanante(),
          ':hora_llegada'=>$aseguradora->getHora_llegada(),
          ':hora_finalizacion'=>$aseguradora->getHora_finalizacion(),
          ':id_cliente'=>$aseguradora->getId_cliente())
        );
      return $resultado2;
    }
    public function actualizarAseguradora(aseguradora $aseguradora){
      $data_source = new DataSource();
      $sql = "UPDATE aseguradoras SET
      valor = :valor,
      fecha= :fecha,
      hora = :hora,
      autorizacion= :autorizacion,
      area = :area,
      tipo_servicio = :tipo_servicio,
      descripcion = :descripcion,
      placa = :placa,
      contenedor = :contenedor,
      tipo_vehiculo = :tipo_vehiculo,
      color = :color,
      id_acompanante = :id_acompanante,
      hora_llegada = :hora_llegada,
      hora_finalizacion = :hora_finalizacion,
      id_cliente = :id_cliente
      WHERE id_aseguradora=:id_aseguradora";

      $resultado2 = $data_source->ejecutarActualizacion($sql,array(
        ':id_aseguradora'=>$aseguradora->getId_Aseguradora(),
        ':valor'=>$aseguradora->getValor(),
        ':fecha'=>$aseguradora->getFecha(),
        ':hora'=>$aseguradora->getHora(),
        ':autorizacion'=>$aseguradora->getAutorizacion(),
        ':area'=>$aseguradora->getArea(),
        ':tipo_servicio'=>$aseguradora->getTipo_servicio(),
        ':descripcion'=>$aseguradora->getDescripcion(),
        ':placa'=>$aseguradora->getPlaca(),
        ':contenedor'=>$aseguradora->getContenedor(),
        ':tipo_vehiculo'=>$aseguradora->getTipo_vehiculo(),
        ':color'=>$aseguradora->getColor(),
        ':id_acompanante'=>$aseguradora->getId_Acompanante(),
        ':hora_llegada'=>$aseguradora->getHora_llegada(),
        ':hora_finalizacion'=>$aseguradora->getHora_finalizacion(),
        ':id_cliente'=>$aseguradora->getId_cliente())
      );
    return $resultado2;
  }
  public function listaAseguradora(){

    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `aseguradoras` ");
    $ObjAseguradora = null;
    $arrayAseguradora = array();

    foreach ($data_table as $clave => $valor) {
    $ObjAseguradora = new aseguradora(
        $data_table[$clave]["id_aseguradora"],
        $data_table[$clave]["valor"],
        $data_table[$clave]["fecha"],
        $data_table[$clave]["hora"],
        $data_table[$clave]["autorizacion"],
        $data_table[$clave]["area"],
        $data_table[$clave]["tipo_servicio"],
        $data_table[$clave]["descripcion"],
        $data_table[$clave]["placa"],
        $data_table[$clave]["contenedor"],
        $data_table[$clave]["tipo_vehiculo"],
        $data_table[$clave]["color"],
        $data_table[$clave]["id_acompanante"],
        $data_table[$clave]["hora_llegada"],
        $data_table[$clave]["hora_finalizacion"],
        $data_table[$clave]["id_cliente"]);
        array_push(  $arrayAseguradora, $ObjAseguradora);
      }
      return   $arrayAseguradora;
    }
}
?>
