<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(PERSISTENCIA_PATH ."usuariosDao.php");
require_once(MODEL_PATH ."empleado.php");
require_once(MODEL_PATH ."cliente.php");
require_once(MODEL_PATH ."usuario.php");
class usuariosController{

  public function usuarioId($id){
    $ud=new usuariosDao();
    $var=$ud-> usuarioId($id);
    return $var;
  }

  public function rollBack(){
    $ud=new usuariosDao();
    $var=$ud->rollBack();
    return $var;
  }

  public function guardarUsuario(usuario $usuario){
    $objUsuario = new usuariosDao();
    return $objUsuario->guardarUsuario($usuario);
  }

  public function PerfilEmpleado($id){
    $ud=new usuariosDao();
    $obj = $ud->CargarPerfil($id,"asistente");
    $cookie = array(
      "id_empleado" => $obj[0]->getId_empleado(),
      "id_usuario" => $obj[0]->getId_usuario(),
      "nombre" => $obj[0]->getNombre(),
      "tipo_documento" => $obj[0]->getTipo_documento(),
      "numero_documento" => $obj[0]->getNumero_documento(),
      "direccion" => $obj[0]->getDireccion(),
      "ciudad" => $obj[0]->getCiudad(),
      "fijo" => $obj[0]->getFijo(),
      "celular1" => $obj[0]->getCelular1(),
      "celular2" => $obj[0]->getCelular2(),
      "celular3" => $obj[0]->getCelular3(),
      "email" => $obj[0]->getEmail(),
      "foto" => $obj[0]->getFoto()
    );
    return $cookie;
  }
  public function PerfilCliente($id){
    $ud=new usuariosDao();
    $obj = $ud->CargarPerfil($id,"cliente");
    $cookie = array(
      "id_cliente" => $obj[0]->getId_cliente(),
      "id_usuario" => $obj[0]->getId_usuario(),
      "razon" => $obj[0]->getRazon_social(),
      "nombre" => $obj[0]->getNombre_contacto(),
      "tipo_documento" => $obj[0]->getTipo_documento(),
      "numero_documento" => $obj[0]->getNumero_documento(),
      "direccion" => $obj[0]->getDireccion(),
      "ciudad" => $obj[0]->getCiudad(),
      "fijo" => $obj[0]->getFijo(),
      "celular1" => $obj[0]->getCelular1(),
      "celular2" => $obj[0]->getCelular2(),
      "email" => $obj[0]->getEmail(),
      "email2" => $obj[0]->getEmail2(),
      "email3" => $obj[0]->getEmail3());
      return $cookie;
    }


    public function actualizarPerfil($usuario,$rol,$estado,$id){
      $ud=new usuariosDao();
      return  $ud->actualizarPerfil($usuario,$rol,$estado,$id);
    }

    public function actualizarUsuario(usuario $usuario){
      $objUsuario=new usuariosDao();
      return  $objUsuario->actualizarUsuario($usuario);
    }

    public function actualizarDatosEmpleado($id,$nombre,$tipo,$numero,
    $direccion,$ciudad,$fijo,$celular,$celular2,$celular3,$email){
      $ud=new usuariosDao();
      $udc=new empleado();
      $tabla='empleado';
      $objEmpleado = new empleado($id,$nombre,$tipo,$numero,$direccion,$ciudad,$celular1,$celular2,$celular3,$email,$fijo);
      return  $ud->actualizarDatos($id,$objEmpleado,$udc,$tabla);
    }

    public function actualizarDatosCliente($id,$nombre,$razon,$tipo,$numero,$direccion,$ciudad,$fijo,$celular,$celular2,$email,$email2,$email3){
      $ud=new usuariosDao();
      $udc=new cliente();
      $tabla='cliente';
      $obj = new cliente($id,$nombre,$tipo,$numero,$direccion,$ciudad,$celular1,$celular2,$email,$email2,$email3,$fijo);
      return  $ud->actualizarDatos($id,$obj,$udc,$tabla);
    }

    public function cambioClave($id,$clave){
      $ud=new usuariosDao();
      return $ud->cambioClave($id,$clave);
    }

    public function cambioFoto($id,$foto){
      $ud=new usuariosDao();
      return $ud->cambioFoto($id,$foto);
    }

    public function ID_ultimo_Usuario(){
      $ud=new usuariosDao();
      return $ud->ID_ultimo_Usuario();
    }

    public function Nempleados(){
      $ud=new usuariosDao();
      return $ud->Nempleados();
    }

    public function Nclientes(){
      $ud=new usuariosDao();
      return $ud->Nclientes();
    }

    public function cargarListaCliente ($id){
      $ud=new usuariosDao();
      $v=array();
      $v=$ud->cargarListaCliente($id);
      echo $v[0]->getNombre();
      return $v;
    }

    public function desactivar_Usuario ($id){
      $ud = new usuariosDao();
      return $ud->desactivar_Usuario();
    }

    public function verificarUsuario($user)
    {
      $obj=new usuariosDao();
      return $obj->verificarUsuario($user);
    }

}
?>
