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
class clienteDao
{

  public function listaCliente(){

    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `cliente` ORDER BY `cliente`.`nombre_contacto` ASC");
    $objClientes = null;
    $arrayClientes = array();

    foreach ($data_table as $clave => $valor) {
    $objClientes = new cliente(
        $data_table[$clave]["id_cliente"],
        $data_table[$clave]["id_usuario"],
        $data_table[$clave]["razon_social"],
        $data_table[$clave]["nit"],
        $data_table[$clave]["nombre_contacto"],
        $data_table[$clave]["direccion"],
        $data_table[$clave]["ciudad"],
        $data_table[$clave]["fijo"],
        $data_table[$clave]["celular1"],
        $data_table[$clave]["celular2"],
        $data_table[$clave]["email1"],
        $data_table[$clave]["email2"],
        $data_table[$clave]["email3"],
        $data_table[$clave]["email4"],
        $data_table[$clave]["email5"],
        $data_table[$clave]["email6"],
        $data_table[$clave]["email7"],
        $data_table[$clave]["email8"],
        $data_table[$clave]["foto"]);
        array_push(  $arrayClientes, $objClientes);
      }
      return   $arrayClientes;
    }
    public function nCliente(){

      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT count(*) as 'numero'  FROM `cliente` ");
      $objClientes = null;
      $arrayClientes = array();

      if(count($data_table)>0){
        return  $data_table[0]["numero"];
      }else{return 0;}
      }

    public function listaClienteActivos(){

      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `cliente` ");
      $objClientes = null;
      $arrayClientes = array();

      foreach ($data_table as $clave => $valor) {
      $objClientes = new cliente(
          $data_table[$clave]["id_cliente"],
          $data_table[$clave]["id_usuario"],
          $data_table[$clave]["razon_social"],
          $data_table[$clave]["nit"],
          $data_table[$clave]["nombre_contacto"],
          $data_table[$clave]["direccion"],
          $data_table[$clave]["ciudad"],
          $data_table[$clave]["fijo"],
          $data_table[$clave]["celular1"],
          $data_table[$clave]["celular2"],
          $data_table[$clave]["email1"],
          $data_table[$clave]["email2"],
          $data_table[$clave]["email3"],
          $data_table[$clave]["email4"],
          $data_table[$clave]["email5"],
          $data_table[$clave]["email6"],
          $data_table[$clave]["email7"],
          $data_table[$clave]["email8"],
          $data_table[$clave]["foto"]);
          array_push(  $arrayClientes, $objClientes);
        }
        return   $arrayClientes;
      }

    public function clienteId($id_cliente){

      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `cliente` where id_cliente = :id "
      ,array(':id'=>$id_cliente));
      $objClientes = null;

   if( count($data_table)>0){
          $objClientes = new cliente(
          $data_table[0]["id_cliente"],
          $data_table[0]["id_usuario"],
          $data_table[0]["razon_social"],
          $data_table[0]["nit"],
          $data_table[0]["nombre_contacto"],
          $data_table[0]["direccion"],
          $data_table[0]["ciudad"],
          $data_table[0]["fijo"],
          $data_table[0]["celular1"],
          $data_table[0]["celular2"],
          $data_table[0]["email1"],
          $data_table[0]["email2"],
          $data_table[0]["email3"],
          $data_table[0]["email4"],
          $data_table[0]["email5"],
          $data_table[0]["email6"],
          $data_table[0]["email7"],
          $data_table[0]["email8"],
          $data_table[0]["foto"]);
        return $objClientes;}
        else{
          return false;
        }
      }

      public function clienteIdNombre($razonSocial){

    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `cliente` WHERE razon_social like :id ",
    array(':id'=>"%".$razonSocial."%"));
    $objClientes = null;
    $arrayClientes = array();

    foreach ($data_table as $clave => $valor) {
    $objClientes = new cliente(
        $data_table[$clave]["id_cliente"],
        $data_table[$clave]["id_usuario"],
        $data_table[$clave]["razon_social"],
        $data_table[$clave]["nit"],
        $data_table[$clave]["nombre_contacto"],
        $data_table[$clave]["direccion"],
        $data_table[$clave]["ciudad"],
        $data_table[$clave]["fijo"],
        $data_table[$clave]["celular1"],
        $data_table[$clave]["celular2"],
        $data_table[$clave]["email1"],
        $data_table[$clave]["email2"],
        $data_table[$clave]["email3"],
        $data_table[$clave]["email4"],
        $data_table[$clave]["email5"],
        $data_table[$clave]["email6"],
        $data_table[$clave]["email7"],
        $data_table[$clave]["email8"],
        $data_table[$clave]["foto"]);
        array_push(  $arrayClientes, $objClientes);
      }
      return   $arrayClientes;
    }

    public function clienteNombre($razonSocial){

      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `cliente` WHERE razon_social like :id or nombre_contacto like :id ",
      array(':id'=>"%".$razonSocial."%"));
      $objClientes = null;
      $arrayClientes = array();
  
      foreach ($data_table as $clave => $valor) {
      $objClientes = new cliente(
          $data_table[$clave]["id_cliente"],
          $data_table[$clave]["id_usuario"],
          $data_table[$clave]["razon_social"],
          $data_table[$clave]["nit"],
          $data_table[$clave]["nombre_contacto"],
          $data_table[$clave]["direccion"],
          $data_table[$clave]["ciudad"],
          $data_table[$clave]["fijo"],
          $data_table[$clave]["celular1"],
          $data_table[$clave]["celular2"],
          $data_table[$clave]["email1"],
          $data_table[$clave]["email2"],
          $data_table[$clave]["email3"],
          $data_table[$clave]["email4"],
          $data_table[$clave]["email5"],
          $data_table[$clave]["email6"],
          $data_table[$clave]["email7"],
          $data_table[$clave]["email8"],
          $data_table[$clave]["foto"]);
          array_push(  $arrayClientes, $objClientes);
        }
        return   $arrayClientes;
      }

      public function clienteIdUsuario($id_cliente){

        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `cliente` where id_usuario = :id "
        ,array(':id'=>$id_cliente));
        $objClientes = null;
        //$arrayClientes = array();
       // foreach ($data_table as $clave => $valor) {
        $objClientes = new cliente(
          $data_table[0]["id_cliente"],
          $data_table[0]["id_usuario"],
          $data_table[0]["razon_social"],
          $data_table[0]["nit"],
          $data_table[0]["nombre_contacto"],
          $data_table[0]["direccion"],
          $data_table[0]["ciudad"],
          $data_table[0]["fijo"],
          $data_table[0]["celular1"],
          $data_table[0]["celular2"],
          $data_table[0]["email1"],
          $data_table[0]["email2"],
          $data_table[0]["email3"],
          $data_table[0]["email4"],
          $data_table[0]["email5"],
          $data_table[0]["email6"],
          $data_table[0]["email7"],
          $data_table[0]["email8"],
          $data_table[0]["foto"]);
           // array_push(  $arrayClientes, $objClientes);
         // }
         // return $arrayClientes;
         return $objClientes;
        }


      public function registrarCliente(Cliente $cliente){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO cliente VALUES (null,:id_usuario,:razon,:nit,:nombre,
          :direccion,:ciudad,:fijo,:celular1,:celular2,:email1,:email2,:email3,:email4,:email5,
          :email6,:email7,:email8,:foto)";
          $resultado2 = $data_source->ejecutarActualizacion($sql2,array(
            ':id_usuario'=>$cliente->getId_usuario(),
            ':razon'=>$cliente->getRazon_social(),
            ':nit'=>$cliente->getNit(),
            ':nombre'=>$cliente->getNombre(),
            ':direccion'=>$cliente->getDireccion(),
            ':ciudad'=>$cliente->getCiudad(),
            ':fijo'=>$cliente->getFijo(),
            ':celular1'=>$cliente->getCelular1(),
            ':celular2'=>$cliente->getCelular2(),
            ':email1'=>$cliente->getEmail(),
            ':email2'=>$cliente->getEmail2(),
            ':email3'=>$cliente->getEmail3(),
            ':email4'=>$cliente->getEmail4(),
            ':email5'=>$cliente->getEmail5(),
            ':email6'=>$cliente->getEmail6(),
            ':email7'=>$cliente->getEmail7(),
            ':email8'=>$cliente->getEmail8(),
            ':foto'=>$cliente->getFoto())
          );
        return $resultado2;
      }

      public function actualizarCliente(Cliente $cliente){
        $data_source = new DataSource();
        $sql = "UPDATE cliente SET

        razon_social = :razon,
        nit = :nit,
        nombre_contacto = :nombre,
        direccion= :direccion,
        ciudad = :ciudad,
        fijo = :fijo,
        celular1 = :celular1,
        celular2 = :celular2,
        email1 = :email1,
        email2 = :email2,
        email3 = :email3,
        email4 = :email4,
        email5 = :email5,
        email6 = :email6,
        email7 = :email7,
        email8 = :email8
        WHERE id_cliente = :id_cliente" ;

        $resultado2 = $data_source->ejecutarActualizacion($sql,array(
          ':id_cliente'=>$cliente->getId_cliente(),
          ':razon'=>$cliente->getRazon_social(),
          ':nit'=>$cliente->getNit(),
          ':nombre'=>$cliente->getNombre(),
          ':direccion'=>$cliente->getDireccion(),
          ':ciudad'=>$cliente->getCiudad(),
          ':fijo'=>$cliente->getFijo(),
          ':celular1'=>$cliente->getCelular1(),
          ':celular2'=>$cliente->getCelular2(),
          ':email1'=>$cliente->getEmail(),
          ':email2'=>$cliente->getEmail2(),
          ':email3'=>$cliente->getEmail3(),
          ':email4'=>$cliente->getEmail4(),
          ':email5'=>$cliente->getEmail5(),
          ':email6'=>$cliente->getEmail6(),
          ':email7'=>$cliente->getEmail7(),
          ':email8'=>$cliente->getEmail8())
        );
      return $resultado2;
    }
  }
  ?>
