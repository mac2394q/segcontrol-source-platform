<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(PERSISTENCIA_PATH."acompananteDao.php");
require_once(MODEL_PATH."acompanante.php");


  class acompananteController {

    public function registrarAcompanante(acompanante $acompanante){
      $ObjAcompanante=new acompananteDao();
      return   $ObjAcompanante->registrarAcompanante($acompanante);
    }

    public function actualizarAcompanante(acompanante $acompanante){
      $ObjAcompanante=new acompananteDao();
      return   $ObjAcompanante->actualizarAcompanante($acompanante);
    }

    public function listaAcompanante(){
      $ObjAcompanante=new acompananteDao();
      return  $ObjAcompanante->listaAcompanante();
    }

    public function acompananteId($id_acompanante){
      $ObjAcompanante=new acompananteDao();
      return $ObjAcompanante->acompananteId($id_acompanante);
    }

    public function acompananteNombre($Nombre){
      $ObjAcompanante=new acompananteDao();
      return $ObjAcompanante->acompananteNombre($Nombre);
    }
  }

?>
