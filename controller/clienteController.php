<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(PERSISTENCIA_PATH."usuariosDao.php");
require_once(PERSISTENCIA_PATH."serviciosDao.php");
require_once(PERSISTENCIA_PATH."clienteDao.php");
require_once(MODEL_PATH."empleado.php");
require_once(MODEL_PATH."cliente.php");
require_once(MODEL_PATH."servicios.php");
require_once(MODEL_PATH."minuta.php");
require_once(MODEL_PATH."conductor.php");
require_once(MODEL_PATH."vehiculo.php");
class clienteController{

    public function registrarCliente(cliente $cliente){
      $ObjCliente=new clienteDao();
      return  $ObjCliente->registrarCliente($cliente);
    }

    public function actualizarCliente(Cliente $cliente){
      $ObjCliente=new clienteDao();
      return   $ObjCliente->actualizarCliente($cliente);
    }

    public function listaClientes(){
      $ObjCliente=new clienteDao();
      return   $ObjCliente->listaCliente();
    }

    public function listaClientesActivos(){
      $ObjCliente=new clienteDao();
      return   $ObjCliente->listaClienteActivos();
    }

    public function clienteId($id_cliente){
      $ObjCliente=new clienteDao();
      return $ObjCliente->clienteId($id_cliente);
    }

    public function clienteIdNombre($RazonSocial){
      $ObjCliente=new clienteDao();
      return $ObjCliente->clienteIdNombre($RazonSocial);
    }

    public function clienteNombre($RazonSocial){
      $ObjCliente=new clienteDao();
      return $ObjCliente->clienteNombre($RazonSocial);
    }

    public function clienteIdUsuario($id_usuario){
      $ObjCliente=new clienteDao();
      return   $ObjCliente->clienteIdUsuario($id_usuario);
    }

}


?>
