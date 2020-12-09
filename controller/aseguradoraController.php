<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(PERSISTENCIA_PATH."aseguradoraDao.php");
require_once(MODEL_PATH."aseguradora.php");
class aseguradoraController{

    public function registrarAseguradora(aseguradora $aseguradora){
      $ObjAseguradora=new aseguradoraDao();
      return   $ObjAseguradora->registrarAseguradora($aseguradora);
    }

    public function actualizarAseguradora(aseguradora $aseguradora){
      $ObjAseguradora=new aseguradoraDao();
      return   $ObjAseguradora->actualizarAseguradora($aseguradora);
    }

    public function listaAseguradora(){
      $ObjAseguradora=new aseguradoraDao();
      return   $ObjAseguradora->listaAseguradora();
    }

    public function aseguradoraId($id_aseguradora){
      $ObjAseguradora=new aseguradoraDao();
      return $ObjAseguradora->aseguradoraId($id_aseguradora);
    }


}


?>
