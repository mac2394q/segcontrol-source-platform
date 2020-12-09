<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(PERSISTENCIA_PATH.'usuariosDao.php');

class sesionController{

  public function validarSesion($u,$c){
    $s = new usuariosDAO();
    $obj = $s->validadSesion($u,$c);
    if(is_null($obj) ){
      echo  "<span> No se encuentra el usuario o la contraseña es incorrecta </span>";
    }else{
      $cookie = new usuario(
        $obj->getId_usuario(),
        $obj->getId_rol(),
        $obj->getUsuario(),
        $obj->getClave(),
        $obj->getEstado()
      );
      $url ="master.php?id=".$obj->getId_usuario()."&rol=".$obj->getId_rol();
      echo  "<script>window.location.replace('".$url."');</script> ";
    }
  }
}
?>
