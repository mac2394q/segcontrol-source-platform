<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(PERSISTENCIA_PATH ."usuariosDao.php");
require_once(PERSISTENCIA_PATH."UtilidadesDAO.php");
require_once(MODEL_PATH."usuario.php");
require_once(ROOT_PATH."configuracion/ParametrosSistema.php");



function transaccionDatos(usuario $usuario,cliente $cliente){

$resultadoTransaccion=0;
try {
  $param=new ParametrosSistema();
  $mbd = new PDO("mysql:host=".$param->getIPBD().";dbname=".$param->getNombreBD().";", $param->getUsuarioBD(), $param->getClaveBD(),
      array(PDO::ATTR_PERSISTENT => true));

 } catch (Exception $e) {
  die("No se pudo conectar: " . $e->getMessage());
}
 $user=new usuario($user);

try {

  $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$flagInsertarUsuario=procesarUsuario($user);
$cliente=new cliente(0, $user->getId_usuario());

$flagInsertarCliente=procesarCliente($cliente);
  $mbd->beginTransaction();
  if($flagInsertarUsuario){ $mbd->exec(obtenerSQLInsertarUsuario($user));}
  if($flagInsertarCliente){ $mbd->exec(obtenerSQLInsertarCliente($cliente));}

  $mbd->commit();
  $mbd=null;
  $resultadoTransaccion=1;
} catch (Exception $e) {
  $mbd->rollBack();

  if($mbd!=null){
    $mbd=null;
  }
  echo "Fallo: " . $e->getMessage();
  //throw new  Exception("imposible insertar datos", 1);

}
return $resultadoTransaccion;
}

 function procesarUsuario($user){
try{
 $result=0;
 $utilDAO=new  UtilidadesDAO();
 $id=$utilDAO->generarMax("id_usuario", "usuario");

 $user->setId_usuario($id);
 $result=1;
}
catch(Exception $error){
throw new Exception("error al insertar usuario:" . $error->getMessage());

}
return $result;

}

//*************************************
//
function procesarCliente($cliente){
try{
$result=0;
$utilDAO=new  UtilidadesDAO();
$id=$utilDAO->generarMax("id_cliente", "cliente");

$cliente->setId_cliente($id);
$result=1;
}
catch(Exception $errors){
throw new Exception("error al insertar empleado:" . $error->getMessage());

}
return $result;

}


 function obtenerSQLInsertarUsuario($usuario){

  $sql = "INSERT INTO  usuario values(" .$usuario->getId_usuario() .","
  ."".$usuario->getId_rol() .", "
  ."'".$usuario->getUsuario() ."', "
  ."'".$usuario->getClave() ."', "
  ."'"."ACTIVO" ."')";

echo "Insertar usuario:$sql" ."<br>";
return $sql;
}

function obtenerSQLInsertarCliente($cliente){
  $sql = "INSERT INTO  cliente values(" .$cliente->getId_Cliente() .","
  .$cliente->getId_Usuario() .", "
  ."'".$cliente->getRazon_social() ."', "
  ."'".$cliente->getNit() ."', "
  ."'".$cliente->getNombre()."', "
  ."'".$cliente->getDireccion()."', "
  ."'".$cliente->getCiudad() ."', "
  ."'".$cliente->getFijo() ."', "
  ."'".$cliente->getCelular1() ."', "
  ."'".$cliente->getCelular2() ."', "
  ."'".$cliente->getEmail() ."', "
  ."'".$cliente->getEmail2() ."', "
  ."'".$cliente->getEmail3() ."', "
  ."'".$cliente->getEmail4() ."', "
  ."'".$cliente->getEmail5() ."', "
  ."'".$cliente->getEmail6() ."', "
  ."'".$cliente->getEmail7() ."', "
  ."'".$cliente->getEmail8() ."', "
  ."'".$cliente->getFoto() ."' )";
 echo "Insertar empresa:$sql" ."<br>";
 return $sql;

}

  ?>
